<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class RetryingClient implements ClientInterface
{
    public const OPTION_REQUEST_OPTIONS = 'revkeen_request_options';
    public const OPTION_OPERATION_IDEMPOTENT = 'revkeen_operation_idempotent';
    public const OPTION_STRUCTURED_ERRORS = 'revkeen_structured_errors';

    /** @var \Closure(int): void */
    private \Closure $sleep;

    public function __construct(
        private readonly ClientInterface $client,
        private readonly float $default_connect_timeout_seconds = 10.0,
        private readonly float $default_read_timeout_seconds = 30.0,
        private readonly RetryPolicy $retry_policy = new RetryPolicy(),
        ?callable $sleep = null
    ) {
        $this->sleep = $sleep !== null
            ? \Closure::fromCallable($sleep)
            : static function (int $milliseconds): void {
                if ($milliseconds > 0) {
                    usleep($milliseconds * 1000);
                }
            };
    }

    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        /** @var ResponseInterface $response */
        $response = $this->sendAsync($request, $options)->wait();
        return $response;
    }

    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        $request_options = $options[self::OPTION_REQUEST_OPTIONS] ?? new RequestOptions();
        if (!$request_options instanceof RequestOptions) {
            throw new \InvalidArgumentException(self::OPTION_REQUEST_OPTIONS . ' must be a RequestOptions instance.');
        }
        $operation_is_idempotent = ($options[self::OPTION_OPERATION_IDEMPOTENT] ?? false) === true;
        $structured_errors = ($options[self::OPTION_STRUCTURED_ERRORS] ?? false) === true;
        unset(
            $options[self::OPTION_REQUEST_OPTIONS],
            $options[self::OPTION_OPERATION_IDEMPOTENT],
            $options[self::OPTION_STRUCTURED_ERRORS]
        );

        $options['connect_timeout'] = $request_options->connect_timeout_seconds
            ?? ($options['connect_timeout'] ?? $this->default_connect_timeout_seconds);
        $read_timeout = $request_options->read_timeout_seconds
            ?? ($options['read_timeout'] ?? $this->default_read_timeout_seconds);
        $options['read_timeout'] = $read_timeout;
        $options['timeout'] = $request_options->read_timeout_seconds
            ?? ($options['timeout'] ?? $this->default_read_timeout_seconds);

        $request = RequestContext::fromRequest($request, $request_options)->apply($request);
        $may_retry = $this->retry_policy->canRetry($request, $operation_is_idempotent);
        if ($may_retry && strtoupper($request->getMethod()) === 'POST' && !$request->getBody()->isSeekable()) {
            $may_retry = false;
        }

        $attempt = function (int $attempt_number) use (
            &$attempt,
            $request,
            $options,
            $may_retry,
            $structured_errors
        ): PromiseInterface {
            try {
                if ($request->getBody()->isSeekable()) {
                    $request->getBody()->rewind();
                }
                $promise = $this->client->sendAsync($request, $options);
            } catch (\Throwable $failure) {
                $promise = Create::rejectionFor($failure);
            }

            return $promise->then(
                function (ResponseInterface $response) use (
                    &$attempt,
                    $attempt_number,
                    $may_retry,
                    $request,
                    $structured_errors
                ) {
                    if (
                        $may_retry
                        && $attempt_number < $this->retry_policy->maxAttempts()
                        && $this->retry_policy->isRetryableStatus($response->getStatusCode())
                    ) {
                        ($this->sleep)($this->retry_policy->delayMilliseconds($attempt_number, $response));
                        return $attempt($attempt_number + 1);
                    }

                    if ($structured_errors && $response->getStatusCode() >= 400) {
                        throw ApiErrorFactory::fromResponse($response, $request, $attempt_number);
                    }

                    return $response;
                },
                function ($failure) use (&$attempt, $attempt_number, $may_retry, $structured_errors) {
                    if (!$failure instanceof \Throwable) {
                        throw new \RuntimeException('HTTP transport rejected with a non-Throwable value.');
                    }

                    if (
                        $may_retry
                        && $attempt_number < $this->retry_policy->maxAttempts()
                        && $this->retry_policy->isRetryableFailure($failure)
                    ) {
                        $response = method_exists($failure, 'getResponse') ? $failure->getResponse() : null;
                        ($this->sleep)($this->retry_policy->delayMilliseconds($attempt_number, $response));
                        return $attempt($attempt_number + 1);
                    }

                    if ($structured_errors) {
                        throw ApiErrorFactory::fromThrowable($failure, $attempt_number);
                    }

                    throw $failure;
                }
            );
        };

        return $attempt(1);
    }

    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->client->request($method, $uri, $options);
    }

    public function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->client->requestAsync($method, $uri, $options);
    }

    public function getConfig(?string $option = null)
    {
        return $this->client->getConfig($option);
    }
}
