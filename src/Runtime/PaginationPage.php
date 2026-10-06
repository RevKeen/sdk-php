<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

final class PaginationPage
{
    /**
     * @param list<mixed> $items
     */
    public function __construct(
        public readonly array $items,
        public readonly mixed $next_state = null,
        public readonly mixed $raw_response = null
    ) {
        if (!array_is_list($items)) {
            throw new \InvalidArgumentException('PaginationPage items must be a list.');
        }
    }
}
