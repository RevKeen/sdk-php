<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Available billing intervals (monthly, quarterly, yearly) with their configuration and pricing multipliers.
 */
class BillingIntervalsResponse extends JsonSerializableType
{
    /**
     * @var array<BillingIntervalsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([BillingIntervalsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<BillingIntervalsResponseDataItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
