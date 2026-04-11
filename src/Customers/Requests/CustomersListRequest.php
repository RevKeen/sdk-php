<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CustomersListRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of results to skip
     */
    public ?int $offset;

    /**
     * @var ?string $search Search term to filter customers
     */
    public ?string $search;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
