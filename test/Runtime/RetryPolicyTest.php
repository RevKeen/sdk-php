<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\RetryPolicy;

final class RetryPolicyTest extends TestCase
{
    public function testCanonicalRetryContract(): void
    {
        $policy = new RetryPolicy(jitter: static fn (int $cap): int => $cap);

        self::assertSame(3, $policy->maxAttempts());
        self::assertSame([408, 425, 429, 500, 502, 503, 504], RetryPolicy::RETRYABLE_STATUSES);
        self::assertFalse($policy->isRetryableStatus(409));
        self::assertSame(250, $policy->delayMilliseconds(1));
        self::assertSame(500, $policy->delayMilliseconds(2));
        self::assertSame(1000, $policy->delayMilliseconds(3));
        self::assertSame(2000, $policy->delayMilliseconds(4));
        self::assertSame(2000, $policy->delayMilliseconds(8));
    }

    public function testOnlyGetAndProvenKeyedPostAreRetryEligible(): void
    {
        $policy = new RetryPolicy();
        self::assertTrue($policy->canRetry(new Request('GET', '/resource'), false));
        self::assertFalse($policy->canRetry(new Request('POST', '/resource'), true));
        self::assertFalse($policy->canRetry(
            new Request('POST', '/resource', ['Idempotency-Key' => 'stable_key_123']),
            false
        ));
        self::assertTrue($policy->canRetry(
            new Request('POST', '/resource', ['Idempotency-Key' => 'stable_key_123']),
            true
        ));

        foreach (['PUT', 'PATCH', 'DELETE'] as $method) {
            self::assertFalse($policy->canRetry(
                new Request($method, '/resource', ['Idempotency-Key' => 'stable_key_123']),
                true
            ));
        }
    }
}
