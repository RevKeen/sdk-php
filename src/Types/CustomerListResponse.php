<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomerListResponse extends JsonSerializableType
{
    /**
     * @var array<CustomerListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([CustomerListResponseDataItem::class])]
    public array $data;

    /**
     * @var CustomerListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public CustomerListResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<CustomerListResponseDataItem>,
     *   pagination: CustomerListResponsePagination,
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
