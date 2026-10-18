<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\ApiErrorFactory;
use RevKeen\Runtime\AuthorizationException;
use RevKeen\Runtime\RateLimit;
use RevKeen\Runtime\RateLimitException;

final class RateLimitTest extends TestCase
{
    private const NOW = 1787000000;

    public function testParsesEveryPublishedHeaderWithContractedUnits(): void
    {
        $rate_limit = RateLimit::fromHeaders([
            'X-RateLimit-Limit' => ['1000'],
            'X-RateLimit-Remaining' => ['0'],
            // X-RateLimit-Reset is a UNIX timestamp in seconds, never milliseconds.
            'X-RateLimit-Reset' => ['1787000000'],
            'Retry-After' => ['30'],
        ], self::NOW);

        self::assertSame(1000, $rate_limit->getLimit());
        self::assertSame(0, $rate_limit->getRemaining(), 'A published 0 must not collapse to null.');
        self::assertSame(30, $rate_limit->getRetryAfterSeconds());
        self::assertNotNull($rate_limit->getResetAt());
        self::assertSame(1787000000, $rate_limit->getResetAt()->getTimestamp());
        self::assertTrue($rate_limit->isPresent());
    }

    public function testResolvesHttpDateRetryAfterAndNeverClampsIt(): void
    {
        $http_date = gmdate('D, d M Y H:i:s \G\M\T', self::NOW + 45);
        self::assertSame(
            45,
            RateLimit::fromHeaders(['Retry-After' => [$http_date]], self::NOW)->getRetryAfterSeconds()
        );

        // RetryPolicy bounds its own sleep. Error metadata reports what the
        // server actually said.
        self::assertSame(
            600,
            RateLimit::fromHeaders(['Retry-After' => ['600']], self::NOW)->getRetryAfterSeconds()
        );
    }

    public function testAbsentAndUnparseableHeadersStayNull(): void
    {
        $absent = RateLimit::fromHeaders([], self::NOW);
        self::assertNull($absent->getLimit());
        self::assertNull($absent->getRemaining());
        self::assertNull($absent->getResetAt());
        self::assertNull($absent->getRetryAfterSeconds());
        self::assertFalse($absent->isPresent());

        $unparseable = RateLimit::fromHeaders([
            'X-RateLimit-Limit' => ['  '],
            'X-RateLimit-Remaining' => ['many'],
            'X-RateLimit-Reset' => ['-1'],
            'Retry-After' => ['soon'],
        ], self::NOW);
        self::assertFalse($unparseable->isPresent());
    }

    public function testHeaderLookupIsCaseInsensitive(): void
    {
        self::assertSame(
            7,
            RateLimit::fromHeaders(['x-ratelimit-remaining' => ['7']], self::NOW)->getRemaining()
        );
    }

    public function testTypedErrorsSurfaceTheRateLimitHeaders(): void
    {
        $limited = ApiErrorFactory::fromResponse(new Response(
            429,
            [
                'X-RateLimit-Limit' => '1000',
                'X-RateLimit-Remaining' => '0',
                'Retry-After' => '30',
            ],
            '{"error":{"type":"rate_limit_error","code":"rate_limit_exceeded"}}'
        ));

        self::assertInstanceOf(RateLimitException::class, $limited);
        self::assertSame(30, $limited->getRateLimit()->getRetryAfterSeconds());
        self::assertSame(0, $limited->getRateLimit()->getRemaining());

        // REV-6760 renamed the 403 envelope type to authorization_error. The
        // taxonomy keys off the HTTP status, so the rename cannot reclassify it,
        // and an unrated response reports an empty RateLimit rather than zeros.
        $forbidden = ApiErrorFactory::fromResponse(new Response(
            403,
            [],
            '{"error":{"type":"authorization_error","code":"insufficient_permissions"}}'
        ));

        self::assertInstanceOf(AuthorizationException::class, $forbidden);
        self::assertFalse($forbidden->getRateLimit()->isPresent());
        self::assertNull($forbidden->getRateLimit()->getRetryAfterSeconds());
    }
}
