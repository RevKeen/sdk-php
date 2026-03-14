<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutGetFunnelResponseStepsItem extends JsonSerializableType
{
    /**
     * @var float $stepNumber
     */
    #[JsonProperty('stepNumber')]
    public float $stepNumber;

    /**
     * @var string $stepName
     */
    #[JsonProperty('stepName')]
    public string $stepName;

    /**
     * @var float $sessions
     */
    #[JsonProperty('sessions')]
    public float $sessions;

    /**
     * @var float $uniqueCustomers
     */
    #[JsonProperty('uniqueCustomers')]
    public float $uniqueCustomers;

    /**
     * @var float $uniqueAnonymous
     */
    #[JsonProperty('uniqueAnonymous')]
    public float $uniqueAnonymous;

    /**
     * @var float $totalEvents
     */
    #[JsonProperty('totalEvents')]
    public float $totalEvents;

    /**
     * @var ?float $avgTimeOnPageSeconds
     */
    #[JsonProperty('avgTimeOnPageSeconds')]
    public ?float $avgTimeOnPageSeconds;

    /**
     * @var float $exits
     */
    #[JsonProperty('exits')]
    public float $exits;

    /**
     * @var ?float $dropOffRate
     */
    #[JsonProperty('dropOffRate')]
    public ?float $dropOffRate;

    /**
     * @param array{
     *   stepNumber: float,
     *   stepName: string,
     *   sessions: float,
     *   uniqueCustomers: float,
     *   uniqueAnonymous: float,
     *   totalEvents: float,
     *   exits: float,
     *   avgTimeOnPageSeconds?: ?float,
     *   dropOffRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->stepNumber = $values['stepNumber'];
        $this->stepName = $values['stepName'];
        $this->sessions = $values['sessions'];
        $this->uniqueCustomers = $values['uniqueCustomers'];
        $this->uniqueAnonymous = $values['uniqueAnonymous'];
        $this->totalEvents = $values['totalEvents'];
        $this->avgTimeOnPageSeconds = $values['avgTimeOnPageSeconds'] ?? null;
        $this->exits = $values['exits'];
        $this->dropOffRate = $values['dropOffRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
