<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

final class RequestOptions
{
    public function __construct(
        public readonly ?float $connect_timeout_seconds = null,
        public readonly ?float $read_timeout_seconds = null,
        public readonly ?string $request_id = null,
        public readonly ?string $trace_id = null
    ) {
        self::assertPositiveFinite($connect_timeout_seconds, 'connect_timeout_seconds');
        self::assertPositiveFinite($read_timeout_seconds, 'read_timeout_seconds');
        self::assertHeaderValue($request_id, 'request_id');
        self::assertHeaderValue($trace_id, 'trace_id');
    }

    private static function assertPositiveFinite(?float $value, string $name): void
    {
        if ($value !== null && ($value <= 0 || !is_finite($value))) {
            throw new \InvalidArgumentException(sprintf('%s must be a positive finite number.', $name));
        }
    }

    private static function assertHeaderValue(?string $value, string $name): void
    {
        if ($value !== null && !preg_match('/^[A-Za-z0-9._:\/-]{1,128}$/D', $value)) {
            throw new \InvalidArgumentException(sprintf('%s is not a safe correlation identifier.', $name));
        }
    }
}
