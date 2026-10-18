<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

final class MoneyMinor implements \JsonSerializable
{
    private readonly int $value;

    public function __construct(mixed $value)
    {
        if (!is_int($value)) {
            throw new \InvalidArgumentException('MoneyMinor requires an integer minor-unit value.');
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function jsonSerialize(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
