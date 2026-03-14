<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsRevenueGetMrrSummaryResponse extends JsonSerializableType
{
    /**
     * @var float $currentMrr
     */
    #[JsonProperty('currentMrr')]
    public float $currentMrr;

    /**
     * @var float $previousMrr
     */
    #[JsonProperty('previousMrr')]
    public float $previousMrr;

    /**
     * @var float $growth
     */
    #[JsonProperty('growth')]
    public float $growth;

    /**
     * @var float $newMrr
     */
    #[JsonProperty('newMrr')]
    public float $newMrr;

    /**
     * @var float $churnedMrr
     */
    #[JsonProperty('churnedMrr')]
    public float $churnedMrr;

    /**
     * @var float $expansionMrr
     */
    #[JsonProperty('expansionMrr')]
    public float $expansionMrr;

    /**
     * @var float $contractionMrr
     */
    #[JsonProperty('contractionMrr')]
    public float $contractionMrr;

    /**
     * @var string $asOfDate
     */
    #[JsonProperty('asOfDate')]
    public string $asOfDate;

    /**
     * @param array{
     *   currentMrr: float,
     *   previousMrr: float,
     *   growth: float,
     *   newMrr: float,
     *   churnedMrr: float,
     *   expansionMrr: float,
     *   contractionMrr: float,
     *   asOfDate: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currentMrr = $values['currentMrr'];
        $this->previousMrr = $values['previousMrr'];
        $this->growth = $values['growth'];
        $this->newMrr = $values['newMrr'];
        $this->churnedMrr = $values['churnedMrr'];
        $this->expansionMrr = $values['expansionMrr'];
        $this->contractionMrr = $values['contractionMrr'];
        $this->asOfDate = $values['asOfDate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
