<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

/** @template T */
final class OptionalValue implements \JsonSerializable
{
    private function __construct(
        private readonly bool $present,
        private readonly mixed $value
    ) {
    }

    /** @return self<never> */
    public static function absent(): self
    {
        return new self(false, null);
    }

    /**
     * @template V
     * @param V $value
     * @return self<V>
     */
    public static function of(mixed $value): self
    {
        return new self(true, $value);
    }

    /**
     * @template V
     * @param array<string, V> $source
     * @return self<V>
     */
    public static function fromArray(array $source, string $key): self
    {
        return array_key_exists($key, $source) ? self::of($source[$key]) : self::absent();
    }

    public function isPresent(): bool
    {
        return $this->present;
    }

    public function isAbsent(): bool
    {
        return !$this->present;
    }

    public function isNull(): bool
    {
        return $this->present && $this->value === null;
    }

    /** @return T */
    public function value(): mixed
    {
        if (!$this->present) {
            throw new \LogicException('Absent optional values do not contain a value.');
        }

        return $this->value;
    }

    /** @param T $fallback @return T */
    public function orElse(mixed $fallback): mixed
    {
        return $this->present ? $this->value : $fallback;
    }

    /**
     * @param array<string, mixed> $target
     * @return array<string, mixed>
     */
    public function applyTo(array $target, string $key): array
    {
        if ($this->present) {
            $target[$key] = $this->value;
        }

        return $target;
    }

    public function jsonSerialize(): mixed
    {
        if (!$this->present) {
            throw new \LogicException('An absent OptionalValue cannot be serialized without a field name.');
        }

        return $this->value;
    }
}
