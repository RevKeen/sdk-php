<?php

namespace RevKeen\Finance\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class FinanceGetIncomeResponseSummary extends JsonSerializableType
{
    /**
     * @var float $totalGrossCents
     */
    #[JsonProperty('total_gross_cents')]
    public float $totalGrossCents;

    /**
     * @var float $totalFeesCents
     */
    #[JsonProperty('total_fees_cents')]
    public float $totalFeesCents;

    /**
     * @var float $totalNetCents
     */
    #[JsonProperty('total_net_cents')]
    public float $totalNetCents;

    /**
     * @var float $totalTxCount
     */
    #[JsonProperty('total_tx_count')]
    public float $totalTxCount;

    /**
     * @var float $totalRefundCount
     */
    #[JsonProperty('total_refund_count')]
    public float $totalRefundCount;

    /**
     * @param array{
     *   totalGrossCents: float,
     *   totalFeesCents: float,
     *   totalNetCents: float,
     *   totalTxCount: float,
     *   totalRefundCount: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalGrossCents = $values['totalGrossCents'];
        $this->totalFeesCents = $values['totalFeesCents'];
        $this->totalNetCents = $values['totalNetCents'];
        $this->totalTxCount = $values['totalTxCount'];
        $this->totalRefundCount = $values['totalRefundCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
