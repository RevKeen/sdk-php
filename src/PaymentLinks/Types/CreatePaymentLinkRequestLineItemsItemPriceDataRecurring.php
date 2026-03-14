<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreatePaymentLinkRequestLineItemsItemPriceDataRecurring extends JsonSerializableType
{
    /**
     * @var value-of<CreatePaymentLinkRequestLineItemsItemPriceDataRecurringInterval> $interval
     */
    #[JsonProperty('interval')]
    public string $interval;

    /**
     * @var ?int $intervalCount
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @param array{
     *   interval: value-of<CreatePaymentLinkRequestLineItemsItemPriceDataRecurringInterval>,
     *   intervalCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->intervalCount = $values['intervalCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
