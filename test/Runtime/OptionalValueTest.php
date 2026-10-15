<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\OptionalValue;

final class OptionalValueTest extends TestCase
{
    public function testDistinguishesAbsentExplicitNullAndZero(): void
    {
        $absent = OptionalValue::fromArray([], 'amount');
        $null = OptionalValue::fromArray(['amount' => null], 'amount');
        $zero = OptionalValue::fromArray(['amount' => 0], 'amount');

        self::assertTrue($absent->isAbsent());
        self::assertTrue($null->isPresent());
        self::assertTrue($null->isNull());
        self::assertSame(0, $zero->value());
        self::assertSame([], $absent->applyTo([], 'amount'));
        self::assertSame(['amount' => null], $null->applyTo([], 'amount'));
        self::assertSame(['amount' => 0], $zero->applyTo([], 'amount'));
        self::assertSame('null', json_encode($null, JSON_THROW_ON_ERROR));
        self::assertSame('0', json_encode($zero, JSON_THROW_ON_ERROR));
    }

    public function testAbsentValueCannotBeReadOrSerializedWithoutAFieldName(): void
    {
        $absent = OptionalValue::absent();

        try {
            $absent->value();
            self::fail('Expected absent value access to fail.');
        } catch (\LogicException $expected) {
            self::assertTrue($absent->isAbsent());
        }

        $this->expectException(\LogicException::class);
        json_encode($absent, JSON_THROW_ON_ERROR);
    }
}
