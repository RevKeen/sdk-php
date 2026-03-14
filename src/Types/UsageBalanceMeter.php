<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class UsageBalanceMeter extends JsonSerializableType
{
    /**
     * @var string $meterId Meter ID
     */
    #[JsonProperty('meter_id')]
    public string $meterId;

    /**
     * @var string $meterName Meter display name
     */
    #[JsonProperty('meter_name')]
    public string $meterName;

    /**
     * @var ?string $unitName Unit display name
     */
    #[JsonProperty('unit_name')]
    public ?string $unitName;

    /**
     * @var float $currentValue Aggregated usage in current period
     */
    #[JsonProperty('current_value')]
    public float $currentValue;

    /**
     * @var float $includedQuantity Units included in plan (0 if pure metered)
     */
    #[JsonProperty('included_quantity')]
    public float $includedQuantity;

    /**
     * @var float $usedQuantity Usage consumed (same as current_value)
     */
    #[JsonProperty('used_quantity')]
    public float $usedQuantity;

    /**
     * @var float $remainingIncluded Remaining included units (max 0)
     */
    #[JsonProperty('remaining_included')]
    public float $remainingIncluded;

    /**
     * @var float $overageQuantity Units over allowance (max 0)
     */
    #[JsonProperty('overage_quantity')]
    public float $overageQuantity;

    /**
     * @var float $estimatedAmountMinor Estimated charge for overage in minor units
     */
    #[JsonProperty('estimated_amount_minor')]
    public float $estimatedAmountMinor;

    /**
     * @var ?float $totalCostMinor Sum of event cost annotations (null if no cost data)
     */
    #[JsonProperty('total_cost_minor')]
    public ?float $totalCostMinor;

    /**
     * @var ?float $marginMinor Estimated margin: revenue - cost (null if no cost data)
     */
    #[JsonProperty('margin_minor')]
    public ?float $marginMinor;

    /**
     * @var string $currency Currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $periodStart Current billing period start (ISO 8601)
     */
    #[JsonProperty('period_start')]
    public string $periodStart;

    /**
     * @var string $periodEnd Current billing period end (ISO 8601)
     */
    #[JsonProperty('period_end')]
    public string $periodEnd;

    /**
     * @param array{
     *   meterId: string,
     *   meterName: string,
     *   currentValue: float,
     *   includedQuantity: float,
     *   usedQuantity: float,
     *   remainingIncluded: float,
     *   overageQuantity: float,
     *   estimatedAmountMinor: float,
     *   currency: string,
     *   periodStart: string,
     *   periodEnd: string,
     *   unitName?: ?string,
     *   totalCostMinor?: ?float,
     *   marginMinor?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->meterId = $values['meterId'];
        $this->meterName = $values['meterName'];
        $this->unitName = $values['unitName'] ?? null;
        $this->currentValue = $values['currentValue'];
        $this->includedQuantity = $values['includedQuantity'];
        $this->usedQuantity = $values['usedQuantity'];
        $this->remainingIncluded = $values['remainingIncluded'];
        $this->overageQuantity = $values['overageQuantity'];
        $this->estimatedAmountMinor = $values['estimatedAmountMinor'];
        $this->totalCostMinor = $values['totalCostMinor'] ?? null;
        $this->marginMinor = $values['marginMinor'] ?? null;
        $this->currency = $values['currency'];
        $this->periodStart = $values['periodStart'];
        $this->periodEnd = $values['periodEnd'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
