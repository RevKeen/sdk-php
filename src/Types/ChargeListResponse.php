<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ChargeListResponse extends JsonSerializableType
{
    /**
     * @var array<ChargeListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ChargeListResponseDataItem::class])]
    public array $data;

    /**
     * @var ChargeListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ChargeListResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<ChargeListResponseDataItem>,
     *   pagination: ChargeListResponsePagination,
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
