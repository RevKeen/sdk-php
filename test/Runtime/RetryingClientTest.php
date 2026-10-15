<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Promise\CancellationException;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use RevKeen\Runtime\RetryPolicy;
use RevKeen\Runtime\RetryingClient;

final class RetryingClientTest extends TestCase
{
    public function testGetStopsAfterExactlyThreeTotalAttempts(): void
    {
        $attempts = 0;
        $client = $this->clientWithHandler(function (RequestInterface $request) use (&$attempts) {
            ++$attempts;
            return Create::rejectionFor(new ConnectException('timeout', $request));
        });

        try {
            $client->send(new Request('GET', '/resource'));
            self::fail('Expected a timeout.');
        } catch (ConnectException $expected) {
            self::assertSame(3, $attempts);
        }
    }

    public function testProvenKeyedPostRetriesButUnprovenPostDoesNot(): void
    {
        $attempts = 0;
        $client = $this->clientWithHandler(function (RequestInterface $request) use (&$attempts) {
            ++$attempts;
            return $attempts < 3
                ? Create::rejectionFor(new ConnectException('timeout', $request))
                : Create::promiseFor(new Response(200));
        });
        $request = new Request('POST', '/resource', ['Idempotency-Key' => 'stable_key_123']);

        $response = $client->send($request, [RetryingClient::OPTION_OPERATION_IDEMPOTENT => true]);
        self::assertSame(200, $response->getStatusCode());
        self::assertSame(3, $attempts);

        $attempts = 0;
        try {
            $client->send($request);
            self::fail('Expected a timeout.');
        } catch (ConnectException $expected) {
            self::assertSame(1, $attempts);
        }
    }

    public function testCancellationAnd409AreNeverRetried(): void
    {
        $attempts = 0;
        $cancel_client = $this->clientWithHandler(function () use (&$attempts) {
            ++$attempts;
            return Create::rejectionFor(new CancellationException('cancelled'));
        });

        try {
            $cancel_client->send(new Request('GET', '/resource'));
            self::fail('Expected cancellation.');
        } catch (CancellationException $expected) {
            self::assertSame(1, $attempts);
        }

        $attempts = 0;
        $conflict_client = $this->clientWithHandler(function () use (&$attempts) {
            ++$attempts;
            return Create::promiseFor(new Response(409));
        });
        $response = $conflict_client->send(new Request('GET', '/resource'), ['http_errors' => false]);
        self::assertSame(409, $response->getStatusCode());
        self::assertSame(1, $attempts);
    }

    public function testNonSeekablePostBodyIsNeverRetried(): void
    {
        $attempts = 0;
        $client = $this->clientWithHandler(function (RequestInterface $request) use (&$attempts) {
            ++$attempts;
            return Create::rejectionFor(new ConnectException('timeout', $request));
        });
        $request = new Request(
            'POST',
            '/resource',
            ['Idempotency-Key' => 'stable_key_123'],
            new NoSeekStream(Utils::streamFor('body'))
        );

        try {
            $client->send($request, [RetryingClient::OPTION_OPERATION_IDEMPOTENT => true]);
            self::fail('Expected a timeout.');
        } catch (ConnectException $expected) {
            self::assertSame(1, $attempts);
        }
    }

    private function clientWithHandler(callable $handler): RetryingClient
    {
        return new RetryingClient(
            new Client(['handler' => $handler]),
            retry_policy: new RetryPolicy(jitter: static fn (): int => 0),
            sleep: static function (): void {}
        );
    }
}
