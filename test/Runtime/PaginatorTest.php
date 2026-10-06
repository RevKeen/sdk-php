<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\PaginationPage;
use RevKeen\Runtime\Paginator;

final class PaginatorTest extends TestCase
{
    public function testFetchesLazilyRetainsRawPagesAndYieldsAcrossPages(): void
    {
        $fetches = 0;
        $paginator = new Paginator(function ($state) use (&$fetches): PaginationPage {
            ++$fetches;
            if ($state === null) {
                return new PaginationPage([1, 2], 'cursor_2', ['request' => null, 'status' => 200]);
            }
            if ($state === 'cursor_2') {
                return new PaginationPage([3], null, ['request' => 'cursor_2', 'status' => 200]);
            }
            throw new \LogicException('Unexpected state.');
        });

        self::assertSame(0, $fetches);
        self::assertSame([1, 2, 3], iterator_to_array($paginator, false));
        self::assertSame(2, $fetches);
        self::assertSame([null, 'cursor_2'], $paginator->requestedStates());
        self::assertSame([
            ['request' => null, 'status' => 200],
            ['request' => 'cursor_2', 'status' => 200],
        ], $paginator->rawPages());
    }

    public function testStopsOnAnEmptyPageEvenWhenAStateIsReturned(): void
    {
        $fetches = 0;
        $paginator = new Paginator(static function ($state) use (&$fetches): PaginationPage {
            ++$fetches;
            return $state === null
                ? new PaginationPage([], 'next')
                : new PaginationPage(['item'], null);
        });

        self::assertSame([], iterator_to_array($paginator, false));
        self::assertSame(1, $fetches);
    }

    public function testRejectsNonAdvancingPaginationState(): void
    {
        $paginator = new Paginator(
            static fn ($state): PaginationPage => new PaginationPage(['item'], $state),
            'same_cursor'
        );

        $this->expectException(\UnexpectedValueException::class);
        iterator_to_array($paginator, false);
    }

    public function testRequiresCallbackToReturnPaginationPage(): void
    {
        $paginator = new Paginator(static fn () => ['items' => []]);

        $this->expectException(\UnexpectedValueException::class);
        iterator_to_array($paginator, false);
    }
}
