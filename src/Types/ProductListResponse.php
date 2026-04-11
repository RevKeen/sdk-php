<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of products matching the query filters.
 */
class ProductListResponse extends JsonSerializableType
{
    /**
     * @var array<Product> $data
     */
    #[JsonProperty('data'), ArrayType([Product::class])]
    public array $data;

    /**
     * @var Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public Pagination $pagination;

    /**
     * @param array{
     *   data: array<Product>,
     *   pagination: Pagination,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->pagination = $values['pagination'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
