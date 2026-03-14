<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ProductListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data Product objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @var ProductListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ProductListResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
     *   pagination: ProductListResponsePagination,
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
