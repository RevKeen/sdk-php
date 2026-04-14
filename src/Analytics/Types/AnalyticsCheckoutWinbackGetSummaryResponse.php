<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutWinbackGetSummaryResponse extends JsonSerializableType
{
    /**
     * @var float $totalOpportunities
     */
    #[JsonProperty('totalOpportunities')]
    public float $totalOpportunities;

    /**
     * @var AnalyticsCheckoutWinbackGetSummaryResponseByType $byType
     */
    #[JsonProperty('byType')]
    public AnalyticsCheckoutWinbackGetSummaryResponseByType $byType;

    /**
     * @var AnalyticsCheckoutWinbackGetSummaryResponseByStatus $byStatus
     */
    #[JsonProperty('byStatus')]
    public AnalyticsCheckoutWinbackGetSummaryResponseByStatus $byStatus;

    /**
     * @var float $totalPotentialValueCents
     */
    #[JsonProperty('totalPotentialValueCents')]
    public float $totalPotentialValueCents;

    /**
     * @var float $recoveredValueCents
     */
    #[JsonProperty('recoveredValueCents')]
    public float $recoveredValueCents;

    /**
     * @var float $conversionRate
     */
    #[JsonProperty('conversionRate')]
    public float $conversionRate;

    /**
     * @param array{
     *   totalOpportunities: float,
     *   byType: AnalyticsCheckoutWinbackGetSummaryResponseByType,
     *   byStatus: AnalyticsCheckoutWinbackGetSummaryResponseByStatus,
     *   totalPotentialValueCents: float,
     *   recoveredValueCents: float,
     *   conversionRate: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalOpportunities = $values['totalOpportunities'];
        $this->byType = $values['byType'];
        $this->byStatus = $values['byStatus'];
        $this->totalPotentialValueCents = $values['totalPotentialValueCents'];
        $this->recoveredValueCents = $values['recoveredValueCents'];
        $this->conversionRate = $values['conversionRate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
