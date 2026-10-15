<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RevKeen\Runtime\ApiError;
use RevKeen\Runtime\ApiErrorFactory;
use RevKeen\Runtime\AuthenticationException;
use RevKeen\Runtime\AuthorizationException;
use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\ConflictException;
use RevKeen\Runtime\FallbackException;
use RevKeen\Runtime\IdempotencyConflictException;
use RevKeen\Runtime\NotFoundException;
use RevKeen\Runtime\RateLimitException;
use RevKeen\Runtime\RetryPolicy;
use RevKeen\Runtime\RetryingClient;
use RevKeen\Runtime\ServerException;
use RevKeen\Runtime\ValidationException;

final class ApiErrorFactoryTest extends TestCase
{
    public function testClassifiesEveryFailureFamily(): void
    {
        $cases = [
            [401, 'authentication_failed', AuthenticationException::class],
            [403, 'permission_denied', AuthorizationException::class],
            [400, 'invalid_request', ValidationException::class],
            [422, 'validation_failed', ValidationException::class],
            [404, 'not_found', NotFoundException::class],
            [429, 'rate_limit_exceeded', RateLimitException::class],
            [409, 'idempotency_key_reused', IdempotencyConflictException::class],
            [409, 'version_conflict', ConflictException::class],
            [503, 'service_unavailable', ServerException::class],
            [418, 'unexpected_status', FallbackException::class],
        ];

        foreach ($cases as [$status, $code, $expected_class]) {
            $error = ApiErrorFactory::fromResponse(new Response(
                $status,
                [],
                json_encode(['error' => ['code' => $code, 'message' => 'failure']], JSON_THROW_ON_ERROR)
            ));
            self::assertInstanceOf($expected_class, $error, (string) $status . ':' . $code);
        }
    }

    public function testPreservesNestedEnvelopeRawBodyIdentifiersAndAttempts(): void
    {
        $body = json_encode(['error' => [
            'type' => 'api_error',
            'code' => 'service_unavailable',
            'message' => 'Please retry later',
            'trace_id' => 'trace_body_123',
            'correlation_id' => 'correlation_body_123',
        ]], JSON_THROW_ON_ERROR);
        $request = new Request('GET', '/resource', ['x-request-id' => 'request_outbound_123']);
        $error = ApiErrorFactory::fromResponse(new Response(
            503,
            ['x-request-id' => 'request_response_123'],
            $body
        ), $request, 3);

        self::assertInstanceOf(ServerException::class, $error);
        self::assertSame('service_unavailable', $error->getMachineCode());
        self::assertSame('Please retry later', $error->getMessage());
        self::assertSame(503, $error->getStatusCode());
        self::assertSame($body, $error->getRawBody());
        self::assertSame('request_response_123', $error->getRequestId());
        self::assertSame('request_response_123', $error->getCorrelationId());
        self::assertSame('trace_body_123', $error->getTraceId());
        self::assertSame(3, $error->getAttempts());
    }

    public function testAcceptsFlatEnvelopeAndRequestHeaderFallback(): void
    {
        $request = new Request('POST', '/resource', [
            'x-request-id' => 'request_outbound_123',
            'x-trace-id' => 'trace_outbound_123',
        ]);
        $error = ApiErrorFactory::fromResponse(new Response(
            422,
            [],
            '{"code":"invalid_amount","message":"Amount is invalid"}'
        ), $request);

        self::assertInstanceOf(ValidationException::class, $error);
        self::assertSame('invalid_amount', $error->getMachineCode());
        self::assertSame('request_outbound_123', $error->getRequestId());
        self::assertSame('trace_outbound_123', $error->getTraceId());
    }

    public function testGeneratedClientOptionsEnableStructuredFinalFailuresWithAttempts(): void
    {
        $attempts = 0;
        $client = new RetryingClient(
            new Client(['handler' => function (RequestInterface $request) use (&$attempts) {
                ++$attempts;
                return Create::rejectionFor(new RequestException(
                    'unavailable',
                    $request,
                    new Response(503, ['x-request-id' => 'request_final_123'], '{"error":{"code":"unavailable"}}')
                ));
            }]),
            retry_policy: new RetryPolicy(jitter: static fn (): int => 0),
            sleep: static function (): void {}
        );

        try {
            $client->send(new Request('GET', '/resource'), ClientFactory::requestOptions(null, false));
            self::fail('Expected a structured final failure.');
        } catch (ApiError $error) {
            self::assertInstanceOf(ServerException::class, $error);
            self::assertSame(3, $error->getAttempts());
            self::assertSame(3, $attempts);
            self::assertSame('request_final_123', $error->getRequestId());
        }
    }

    public function testGeneratedClientOptionsConvertFinalErrorResponses(): void
    {
        $client = new RetryingClient(new Client(['handler' => static function () {
            return Create::promiseFor(new Response(
                404,
                ['x-request-id' => 'request_not_found_123'],
                '{"error":{"code":"resource_not_found","message":"Missing"}}'
            ));
        }]));

        $this->expectException(NotFoundException::class);
        $client->send(new Request('GET', '/missing'), ClientFactory::requestOptions(null, false));
    }

    public function testGeneratedClientOptionsConvertFinalTransportFailures(): void
    {
        $attempts = 0;
        $client = new RetryingClient(
            new Client(['handler' => function (RequestInterface $request) use (&$attempts) {
                ++$attempts;
                return Create::rejectionFor(new ConnectException('connection timed out', $request));
            }]),
            retry_policy: new RetryPolicy(jitter: static fn (): int => 0),
            sleep: static function (): void {}
        );

        try {
            $client->send(new Request('GET', '/resource'), ClientFactory::requestOptions(null, false));
            self::fail('Expected a structured transport failure.');
        } catch (FallbackException $error) {
            self::assertSame(0, $error->getStatusCode());
            self::assertSame(3, $error->getAttempts());
            self::assertSame(3, $attempts);
            self::assertNotNull($error->getRequestId());
            self::assertSame($error->getRequestId(), $error->getCorrelationId());
        }
    }

    public function testInvalidJsonStillProducesFallbackMetadata(): void
    {
        $error = ApiErrorFactory::fromResponse(new Response(418, [], '<html>failure</html>'));
        self::assertInstanceOf(FallbackException::class, $error);
        self::assertSame('unknown_error', $error->getMachineCode());
        self::assertSame('<html>failure</html>', $error->getRawBody());
        self::assertSame('HTTP 418', $error->getMessage());
    }
}
