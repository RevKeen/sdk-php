<?php

namespace RevKeen\Payouts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\PayoutPayment;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PayoutsPaymentsListResponse extends JsonSerializableType
{
    /**
     * @var array<PayoutPayment> $data
     */
    #[JsonProperty('data'), ArrayType([PayoutPayment::class])]
    public array $data;

    /**
     * @var PayoutsPaymentsListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public PayoutsPaymentsListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<PayoutPayment>,
     *   meta: PayoutsPaymentsListResponseMeta,
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
