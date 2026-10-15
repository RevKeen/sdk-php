<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

/** @implements \IteratorAggregate<int, mixed> */
final class Paginator implements \IteratorAggregate
{
    /** @var \Closure(mixed): PaginationPage */
    private \Closure $fetch_page;

    /** @var list<mixed> */
    private array $requested_states = [];

    /** @var list<mixed> */
    private array $raw_pages = [];

    /** @param callable(mixed): PaginationPage $fetch_page */
    public function __construct(callable $fetch_page, private readonly mixed $initial_state = null)
    {
        $this->fetch_page = \Closure::fromCallable($fetch_page);
    }

    public function getIterator(): \Traversable
    {
        $this->requested_states = [];
        $this->raw_pages = [];
        $state = $this->initial_state;
        $seen = [];

        while (true) {
            $fingerprint = self::stateFingerprint($state);
            if (isset($seen[$fingerprint])) {
                throw new \UnexpectedValueException('Pagination state did not advance.');
            }
            $seen[$fingerprint] = true;
            $this->requested_states[] = $state;

            $page = ($this->fetch_page)($state);
            if (!$page instanceof PaginationPage) {
                throw new \UnexpectedValueException('Pagination callback must return PaginationPage.');
            }
            $this->raw_pages[] = $page->raw_response;

            foreach ($page->items as $item) {
                yield $item;
            }

            if ($page->items === [] || $page->next_state === null) {
                return;
            }

            $state = $page->next_state;
        }
    }

    /** @return list<mixed> */
    public function requestedStates(): array
    {
        return $this->requested_states;
    }

    /** @return list<mixed> */
    public function rawPages(): array
    {
        return $this->raw_pages;
    }

    private static function stateFingerprint(mixed $state): string
    {
        if (is_resource($state) || $state instanceof \Closure) {
            throw new \InvalidArgumentException('Pagination state must be serializable.');
        }

        try {
            return hash('sha256', serialize($state));
        } catch (\Throwable $failure) {
            throw new \InvalidArgumentException('Pagination state must be serializable.', 0, $failure);
        }
    }
}
