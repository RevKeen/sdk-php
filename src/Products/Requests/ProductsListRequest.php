<?php

namespace RevKeen\Products\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class ProductsListRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $search Search term to filter products
     */
    public ?string $search;

    /**
     * @param array{
     *   page?: ?int,
     *   limit?: ?int,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
