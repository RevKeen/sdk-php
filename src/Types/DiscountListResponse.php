<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class DiscountListResponse extends JsonSerializableType
{
    /**
     * @var array<Discount> $data
     */
    #[JsonProperty('data'), ArrayType([Discount::class])]
    public array $data;

    /**
     * @var DiscountListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public DiscountListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<Discount>,
     *   meta: DiscountListResponseMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->meta = $values['meta'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
