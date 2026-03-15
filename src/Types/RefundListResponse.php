<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class RefundListResponse extends JsonSerializableType
{
    /**
     * @var array<Refund> $data
     */
    #[JsonProperty('data'), ArrayType([Refund::class])]
    public array $data;

    /**
     * @var RefundListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public RefundListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<Refund>,
     *   meta: RefundListResponseMeta,
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
