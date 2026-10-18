<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

/**
 * The rate-limit headers RevKeen publishes alongside a response.
 *
 * Units are fixed by the public contract and must not be re-derived by callers:
 * the reset instant comes from `X-RateLimit-Reset`, a UNIX timestamp in
 * seconds, and the retry delay comes from `Retry-After` in whole seconds. Each
 * accessor returns null when its header was absent, so a published zero
 * (`X-RateLimit-Remaining: 0`) is never confused with an unreported limit.
 */
final class RateLimit
{
    private function __construct(
        private readonly ?int $limit,
        private readonly ?int $remaining,
        private readonly ?\DateTimeImmutable $reset_at,
        private readonly ?int $retry_after_seconds
    ) {
    }

    public static function absent(): self
    {
        return new self(null, null, null, null);
    }

    /**
     * @param array<string, mixed> $headers PSR-7 style response headers.
     * @param int|null $now UNIX seconds used to resolve an HTTP-date Retry-After.
     */
    public static function fromHeaders(array $headers, ?int $now = null): self
    {
        $reset_seconds = self::nonNegativeInteger(self::headerValue($headers, 'x-ratelimit-reset'));

        return new self(
            self::nonNegativeInteger(self::headerValue($headers, 'x-ratelimit-limit')),
            self::nonNegativeInteger(self::headerValue($headers, 'x-ratelimit-remaining')),
            $reset_seconds === null
                ? null
                : (new \DateTimeImmutable('@' . $reset_seconds))->setTimezone(new \DateTimeZone('UTC')),
            self::retryAfterSeconds(
                self::headerValue($headers, 'retry-after'),
                $now ?? time()
            )
        );
    }

    /** `X-RateLimit-Limit` — requests permitted in the current window. */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /** `X-RateLimit-Remaining` — requests left in the current window. */
    public function getRemaining(): ?int
    {
        return $this->remaining;
    }

    /** `X-RateLimit-Reset` — window reset instant, parsed from UNIX seconds. */
    public function getResetAt(): ?\DateTimeImmutable
    {
        return $this->reset_at;
    }

    /**
     * `Retry-After` — whole seconds to wait, exactly as the server stated it.
     * Never clamped to the SDK retry ceiling; that bound belongs to RetryPolicy.
     */
    public function getRetryAfterSeconds(): ?int
    {
        return $this->retry_after_seconds;
    }

    public function isPresent(): bool
    {
        return $this->limit !== null
            || $this->remaining !== null
            || $this->reset_at !== null
            || $this->retry_after_seconds !== null;
    }

    /** @param array<string, mixed> $headers */
    private static function headerValue(array $headers, string $name): ?string
    {
        foreach ($headers as $header => $values) {
            if (strcasecmp((string) $header, $name) !== 0) {
                continue;
            }

            $value = is_array($values) ? ($values[0] ?? null) : $values;
            if (!is_string($value)) {
                return null;
            }

            $value = trim($value);
            return $value === '' ? null : $value;
        }

        return null;
    }

    private static function nonNegativeInteger(?string $value): ?int
    {
        if ($value === null || ctype_digit($value) === false) {
            return null;
        }

        return (int) $value;
    }

    private static function retryAfterSeconds(?string $value, int $now): ?int
    {
        if ($value === null) {
            return null;
        }

        $seconds = self::nonNegativeInteger($value);
        if ($seconds !== null) {
            return $seconds;
        }

        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return null;
        }

        return max(0, $timestamp - $now);
    }
}
