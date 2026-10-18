<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\Rfc3339DateTime;

final class Rfc3339DateTimeTest extends TestCase
{
    public function testParsesUtcAndExplicitOffsetsAsImmutableInstants(): void
    {
        $utc = Rfc3339DateTime::parse('2026-08-21T14:15:16Z');
        self::assertInstanceOf(\DateTimeImmutable::class, $utc);
        self::assertSame('2026-08-21T14:15:16+00:00', Rfc3339DateTime::format($utc));

        $offset = Rfc3339DateTime::parse('2026-08-21T14:15:16.1234+02:30');
        self::assertSame('+02:30', $offset->format('P'));
        self::assertSame('2026-08-21T14:15:16.123400+02:30', Rfc3339DateTime::format($offset));
    }

    /** @dataProvider invalidTimestamps */
    public function testRejectsInvalidOrOffsetlessTimestamps(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Rfc3339DateTime::parse($value);
    }

    /** @return iterable<string, array{string}> */
    public function invalidTimestamps(): iterable
    {
        yield 'missing offset' => ['2026-08-21T14:15:16'];
        yield 'date only' => ['2026-08-21'];
        yield 'invalid date' => ['2026-02-30T14:15:16Z'];
        yield 'space separator' => ['2026-08-21 14:15:16Z'];
        yield 'unsupported precision' => ['2026-08-21T14:15:16.1234567Z'];
    }
}
