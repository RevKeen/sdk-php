<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

enum ApiKeyKind: string
{
    case SECRET = 'secret';
    case PUBLISHABLE = 'publishable';

    public static function classify(string $key): ?self
    {
        if (preg_match('/^rk_(?:live|sandbox)_[A-Za-z0-9_-]{8,}$/D', $key) === 1) {
            return self::SECRET;
        }

        if (preg_match('/^rk_pk_(?:live|sandbox)_[A-Za-z0-9_-]{8,}$/D', $key) === 1) {
            return self::PUBLISHABLE;
        }

        return null;
    }

    public static function require(string $key, self $expected): void
    {
        if (self::classify($key) !== $expected) {
            throw new \InvalidArgumentException(sprintf('Expected a RevKeen %s API key.', $expected->value));
        }
    }
}
