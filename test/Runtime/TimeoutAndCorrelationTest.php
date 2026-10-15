<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RevKeen\ApiException;
use RevKeen\Runtime\RequestOptions;
use RevKeen\Runtime\RequestContext;
use RevKeen\Runtime\RetryPolicy;
use RevKeen\Runtime\RetryingClient;

final class TimeoutAndCorrelationTest extends TestCase
{
    public function testPerCallTimeoutsAndStableCorrelationHeadersReachEveryAttempt(): void
    {
        $seen = [];
        $attempts = 0;
        $inner = new Client(['handler' => function (RequestInterface $request, array $options) use (&$seen, &$attempts) {
            ++$attempts;
            $seen[] = [$request, $options];
            return Create::promiseFor(new Response($attempts === 1 ? 503 : 200));
        }]);
        $client = new RetryingClient(
            $inner,
            retry_policy: new RetryPolicy(jitter: static fn (): int => 0),
            sleep: static function (): void {}
        );

        $response = $client->send(new Request('GET', '/resource', ['x-correlation-id' => 'legacy']), [
            RetryingClient::OPTION_REQUEST_OPTIONS => new RequestOptions(
                connect_timeout_seconds: 1.25,
                read_timeout_seconds: 4.5,
                request_id: 'request_test_123',
                trace_id: 'trace_test_123'
            ),
            'http_errors' => false,
        ]);

        self::assertSame(200, $response->getStatusCode());
        self::assertCount(2, $seen);
        foreach ($seen as [$request, $options]) {
            self::assertSame('request_test_123', $request->getHeaderLine('x-request-id'));
            self::assertSame('trace_test_123', $request->getHeaderLine('x-trace-id'));
            self::assertFalse($request->hasHeader('x-correlation-id'));
            self::assertSame(1.25, $options['connect_timeout']);
            self::assertSame(4.5, $options['read_timeout']);
            self::assertSame(4.5, $options['timeout']);
        }
    }

    public function testApiExceptionSurfacesCanonicalAndLegacyInboundIds(): void
    {
        $exception = new ApiException('', 503, [
            'x-request-id' => ['request_response'],
            'x-trace-id' => ['trace_response'],
        ]);
        self::assertSame('request_response', $exception->getRequestId());
        self::assertSame('request_response', $exception->getCorrelationId());
        self::assertSame('trace_response', $exception->getTraceId());

        $legacy = new ApiException('', 503, ['x-correlation-id' => ['legacy_response']]);
        self::assertSame('legacy_response', $legacy->getRequestId());
    }

    public function testTraceIdDefaultsToLogicalRequestId(): void
    {
        $context = RequestContext::fromRequest(
            new Request('GET', '/resource'),
            new RequestOptions(request_id: 'request_shared_123')
        );
        self::assertSame('request_shared_123', $context->request_id);
        self::assertSame($context->request_id, $context->trace_id);
    }
}
