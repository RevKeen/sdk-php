<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Current-period usage balance across all meters for a customer, with per-meter breakdowns and estimated totals.
 */
class UsageBalanceResponse extends JsonSerializableType
{
    /**
     * @var value-of<UsageBalanceResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<UsageBalanceMeter> $meters
     */
    #[JsonProperty('meters'), ArrayType([UsageBalanceMeter::class])]
    public array $meters;

    /**
     * @var float $totalEstimatedAmountMinor Total estimated charge across all meters
     */
    #[JsonProperty('total_estimated_amount_minor')]
    public float $totalEstimatedAmountMinor;

    /**
     * @var ?float $totalCostMinor Total cost across all meters (null if no cost data)
     */
    #[JsonProperty('total_cost_minor')]
    public ?float $totalCostMinor;

    /**
     * @var string $currency Currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @param array{
     *   object: value-of<UsageBalanceResponseObject>,
     *   meters: array<UsageBalanceMeter>,
     *   totalEstimatedAmountMinor: float,
     *   currency: string,
     *   totalCostMinor?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->meters = $values['meters'];
        $this->totalEstimatedAmountMinor = $values['totalEstimatedAmountMinor'];
        $this->totalCostMinor = $values['totalCostMinor'] ?? null;
        $this->currency = $values['currency'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
