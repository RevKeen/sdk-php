<?php

namespace RevKeen\Payouts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\Payout;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PayoutsListResponse extends JsonSerializableType
{
    /**
     * @var array<Payout> $data
     */
    #[JsonProperty('data'), ArrayType([Payout::class])]
    public array $data;

    /**
     * @var PayoutsListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public PayoutsListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<Payout>,
     *   meta: PayoutsListResponseMeta,
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
