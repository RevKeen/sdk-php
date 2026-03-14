<?php

namespace RevKeen\Finance\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class GetFinanceSummaryResponse extends JsonSerializableType
{
    /**
     * @var float $totalRevenueCents
     */
    #[JsonProperty('total_revenue_cents')]
    public float $totalRevenueCents;

    /**
     * @var float $totalFeesCents
     */
    #[JsonProperty('total_fees_cents')]
    public float $totalFeesCents;

    /**
     * @var float $pendingBalanceCents
     */
    #[JsonProperty('pending_balance_cents')]
    public float $pendingBalanceCents;

    /**
     * @var float $availableBalanceCents
     */
    #[JsonProperty('available_balance_cents')]
    public float $availableBalanceCents;

    /**
     * @param array{
     *   totalRevenueCents: float,
     *   totalFeesCents: float,
     *   pendingBalanceCents: float,
     *   availableBalanceCents: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalRevenueCents = $values['totalRevenueCents'];
        $this->totalFeesCents = $values['totalFeesCents'];
        $this->pendingBalanceCents = $values['pendingBalanceCents'];
        $this->availableBalanceCents = $values['availableBalanceCents'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
