<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\MoneyMinor;

final class MoneyMinorTest extends TestCase
{
    public function testAcceptsAndSerializesOnlyIntegerMinorUnits(): void
    {
        $money = new MoneyMinor(9007199254740991);
        self::assertSame(9007199254740991, $money->value());
        self::assertSame('9007199254740991', (string) $money);
        self::assertSame('9007199254740991', json_encode($money, JSON_THROW_ON_ERROR));
        self::assertTrue($money->equals(new MoneyMinor(9007199254740991)));
    }

    /** @dataProvider nonIntegerValues */
    public function testRejectsEveryNonIntegerValue(mixed $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new MoneyMinor($value);
    }

    /** @return iterable<string, array{mixed}> */
    public function nonIntegerValues(): iterable
    {
        yield 'fractional float' => [12.5];
        yield 'whole-looking float' => [12.0];
        yield 'numeric string' => ['12'];
        yield 'null' => [null];
        yield 'boolean' => [true];
    }
}
