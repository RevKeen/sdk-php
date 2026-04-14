<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCheckoutAbandonmentGetSummaryResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsCheckoutAbandonmentGetSummaryResponseSummaryItem> $summary
     */
    #[JsonProperty('summary'), ArrayType([AnalyticsCheckoutAbandonmentGetSummaryResponseSummaryItem::class])]
    public array $summary;

    /**
     * @var float $openAlerts
     */
    #[JsonProperty('openAlerts')]
    public float $openAlerts;

    /**
     * @var float $recoveredThisPeriod
     */
    #[JsonProperty('recoveredThisPeriod')]
    public float $recoveredThisPeriod;

    /**
     * @var float $potentialRevenueLostCents
     */
    #[JsonProperty('potentialRevenueLostCents')]
    public float $potentialRevenueLostCents;

    /**
     * @var float $recoveredRevenueCents
     */
    #[JsonProperty('recoveredRevenueCents')]
    public float $recoveredRevenueCents;

    /**
     * @param array{
     *   summary: array<AnalyticsCheckoutAbandonmentGetSummaryResponseSummaryItem>,
     *   openAlerts: float,
     *   recoveredThisPeriod: float,
     *   potentialRevenueLostCents: float,
     *   recoveredRevenueCents: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->summary = $values['summary'];
        $this->openAlerts = $values['openAlerts'];
        $this->recoveredThisPeriod = $values['recoveredThisPeriod'];
        $this->potentialRevenueLostCents = $values['potentialRevenueLostCents'];
        $this->recoveredRevenueCents = $values['recoveredRevenueCents'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
