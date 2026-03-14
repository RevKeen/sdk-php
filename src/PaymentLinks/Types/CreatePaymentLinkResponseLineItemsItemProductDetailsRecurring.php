<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreatePaymentLinkResponseLineItemsItemProductDetailsRecurring extends JsonSerializableType
{
    /**
     * @var value-of<CreatePaymentLinkResponseLineItemsItemProductDetailsRecurringInterval> $interval
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
     *   interval: value-of<CreatePaymentLinkResponseLineItemsItemProductDetailsRecurringInterval>,
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
