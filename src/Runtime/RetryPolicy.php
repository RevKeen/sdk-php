<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Promise\CancellationException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class RetryPolicy
{
    public const MAXIMUM_TOTAL_ATTEMPTS = 3;
    public const INITIAL_DELAY_MILLISECONDS = 250;
    public const MAXIMUM_DELAY_MILLISECONDS = 2000;
    public const RETRYABLE_STATUSES = [408, 425, 429, 500, 502, 503, 504];
    public const IDEMPOTENCY_KEY_PATTERN = '/^(?:[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}|[A-Za-z0-9_-]{8,64})$/D';

    /** @var \Closure(int): int */
    private \Closure $jitter;

    public function __construct(
        private readonly int $max_attempts = self::MAXIMUM_TOTAL_ATTEMPTS,
        private readonly int $initial_delay_milliseconds = self::INITIAL_DELAY_MILLISECONDS,
        private readonly int $maximum_delay_milliseconds = self::MAXIMUM_DELAY_MILLISECONDS,
        ?callable $jitter = null
    ) {
        if ($max_attempts < 1 || $max_attempts > self::MAXIMUM_TOTAL_ATTEMPTS) {
            throw new \InvalidArgumentException('max_attempts must be between 1 and 3 total attempts.');
        }
        if ($initial_delay_milliseconds < 0 || $maximum_delay_milliseconds < $initial_delay_milliseconds) {
            throw new \InvalidArgumentException('Retry delay bounds are invalid.');
        }

        $this->jitter = $jitter !== null
            ? \Closure::fromCallable($jitter)
            : static fn (int $cap): int => random_int(0, $cap);
    }

    public function maxAttempts(): int
    {
        return $this->max_attempts;
    }

    public function canRetry(RequestInterface $request, bool $operation_is_idempotent): bool
    {
        $method = strtoupper($request->getMethod());
        if ($method === 'GET') {
            return true;
        }

        if ($method !== 'POST' || !$operation_is_idempotent) {
            return false;
        }

        return preg_match(self::IDEMPOTENCY_KEY_PATTERN, $request->getHeaderLine('Idempotency-Key')) === 1;
    }

    public function isRetryableStatus(int $status): bool
    {
        return in_array($status, self::RETRYABLE_STATUSES, true);
    }

    public function isRetryableFailure(\Throwable $failure): bool
    {
        if ($failure instanceof CancellationException) {
            return false;
        }
        if ($failure instanceof ConnectException) {
            return true;
        }
        if ($failure instanceof RequestException) {
            return $failure->getResponse() === null
                || $this->isRetryableStatus($failure->getResponse()->getStatusCode());
        }

        return $failure instanceof TransferException;
    }

    public function delayMilliseconds(int $completed_attempts, ?ResponseInterface $response = null): int
    {
        $exponent = max(0, $completed_attempts - 1);
        $cap = min(
            $this->maximum_delay_milliseconds,
            $this->initial_delay_milliseconds * (2 ** $exponent)
        );
        $delay = ($this->jitter)($cap);

        if ($response !== null) {
            $retry_after = $this->retryAfterMilliseconds($response->getHeaderLine('Retry-After'));
            if ($retry_after !== null) {
                $delay = max($delay, min($retry_after, $this->maximum_delay_milliseconds));
            }
        }

        return max(0, min($delay, $this->maximum_delay_milliseconds));
    }

    private function retryAfterMilliseconds(string $value): ?int
    {
        $value = trim($value);
        if ($value === '') {
            return null;
        }
        if (ctype_digit($value)) {
            return (int) $value * 1000;
        }

        $timestamp = strtotime($value);
        return $timestamp === false ? null : max(0, ($timestamp - time()) * 1000);
    }
}
