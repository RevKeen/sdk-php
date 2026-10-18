<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RevKeen\Api\PaymentIntentsApi;
use RevKeen\ApiException;
use RevKeen\Configuration;
use RevKeen\Model\CreatePaymentIntentRequest;
use RevKeen\Runtime\RequestOptions;
use RevKeen\Runtime\RetryPolicy;
use RevKeen\Runtime\RetryingClient;

final class PaymentIntentRetrySafetyTest extends TestCase
{
    public function testUnkeyedPaymentCreationTimeoutIsSentExactlyOnce(): void
    {
        $attempts = 0;
        $observed_body = null;
        $transport = new Client(['handler' => function (RequestInterface $request) use (&$attempts, &$observed_body) {
            ++$attempts;
            $observed_body = (string) $request->getBody();
            return Create::rejectionFor(new RequestException(
                'read timeout after request submission',
                $request,
                null,
                null,
                ['errno' => 28]
            ));
        }]);
        $config = (new Configuration())
            ->setHost('https://example.test/v2')
            ->setMaxAttempts(max_attempts: 3);
        $api = new PaymentIntentsApi(client: $transport, config: $config);

        try {
            $api->paymentIntentsCreate(
                create_payment_intent_request: new CreatePaymentIntentRequest([
                    'amount' => 1234,
                    'currency' => 'GBP',
                    'metadata' => ['order_id' => 'order_123'],
                ]),
                request_options: new RequestOptions(
                    connect_timeout_seconds: 0.1,
                    read_timeout_seconds: 0.2
                )
            );
            self::fail('Expected a transport ApiException.');
        } catch (ApiException $expected) {
            self::assertSame(1, $attempts, 'An unkeyed payment-creation POST must never be replayed.');
            self::assertSame(1234, json_decode((string) $observed_body, true)['amount']);
            self::assertNotNull($expected->getRequestId());
            self::assertNotNull($expected->getTraceId());
        }
    }

    public function testProvenPaymentCreationWithCallerKeyCanUseThreeTotalAttempts(): void
    {
        $attempts = 0;
        $observations = [];
        $inner = new Client(['handler' => function (RequestInterface $request) use (&$attempts, &$observations) {
            ++$attempts;
            $observations[] = [
                'body' => (string) $request->getBody(),
                'idempotency_key' => $request->getHeaderLine('Idempotency-Key'),
                'request_id' => $request->getHeaderLine('x-request-id'),
                'trace_id' => $request->getHeaderLine('x-trace-id'),
            ];
            return $attempts < 3
                ? Create::rejectionFor(new RequestException(
                    'read timeout after request submission',
                    $request,
                    null,
                    null,
                    ['errno' => 28]
                ))
                : Create::promiseFor(new Response(200, [], '{}'));
        }]);
        $transport = new RetryingClient(
            $inner,
            retry_policy: new RetryPolicy(jitter: static fn (): int => 0),
            sleep: static function (): void {}
        );
        $api = new PaymentIntentsApi(
            client: $transport,
            config: (new Configuration())->setHost('https://example.test/v2')
        );

        $api->paymentIntentsCreate(
            create_payment_intent_request: new CreatePaymentIntentRequest([
                'amount' => 1234,
                'currency' => 'GBP',
                'metadata' => ['order_id' => 'order_123'],
            ]),
            idempotency_key: 'stable_key_123'
        );
        self::assertSame(3, $attempts);
        self::assertCount(3, $observations);
        foreach (['body', 'idempotency_key', 'request_id', 'trace_id'] as $field) {
            self::assertCount(1, array_unique(array_column($observations, $field)), $field . ' changed across attempts.');
        }
        self::assertSame('stable_key_123', $observations[0]['idempotency_key']);
        self::assertNotSame('', $observations[0]['request_id']);
        self::assertSame($observations[0]['request_id'], $observations[0]['trace_id']);
        self::assertSame([
            'amount' => 1234,
            'currency' => 'GBP',
            'metadata' => ['order_id' => 'order_123'],
        ], array_intersect_key(
            json_decode($observations[0]['body'], true),
            array_flip(['amount', 'currency', 'metadata'])
        ));
    }
}
