<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class SubscriptionCancelSubscriptionResponseDataDunning extends JsonSerializableType
{
    /**
     * @var bool $isInDunning
     */
    #[JsonProperty('isInDunning')]
    public bool $isInDunning;

    /**
     * @var ?float $phase
     */
    #[JsonProperty('phase')]
    public ?float $phase;

    /**
     * @var ?string $phaseLabel
     */
    #[JsonProperty('phaseLabel')]
    public ?string $phaseLabel;

    /**
     * @var ?value-of<SubscriptionCancelSubscriptionResponseDataDunningPhaseSeverity> $phaseSeverity
     */
    #[JsonProperty('phaseSeverity')]
    public ?string $phaseSeverity;

    /**
     * @var float $retryCount
     */
    #[JsonProperty('retryCount')]
    public float $retryCount;

    /**
     * @var float $totalPossibleRetries
     */
    #[JsonProperty('totalPossibleRetries')]
    public float $totalPossibleRetries;

    /**
     * @var ?DateTime $nextRetryAt
     */
    #[JsonProperty('nextRetryAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRetryAt;

    /**
     * @var float $daysInDunning
     */
    #[JsonProperty('daysInDunning')]
    public float $daysInDunning;

    /**
     * @var bool $accessRestricted
     */
    #[JsonProperty('accessRestricted')]
    public bool $accessRestricted;

    /**
     * @param array{
     *   isInDunning: bool,
     *   retryCount: float,
     *   totalPossibleRetries: float,
     *   daysInDunning: float,
     *   accessRestricted: bool,
     *   phase?: ?float,
     *   phaseLabel?: ?string,
     *   phaseSeverity?: ?value-of<SubscriptionCancelSubscriptionResponseDataDunningPhaseSeverity>,
     *   nextRetryAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->isInDunning = $values['isInDunning'];
        $this->phase = $values['phase'] ?? null;
        $this->phaseLabel = $values['phaseLabel'] ?? null;
        $this->phaseSeverity = $values['phaseSeverity'] ?? null;
        $this->retryCount = $values['retryCount'];
        $this->totalPossibleRetries = $values['totalPossibleRetries'];
        $this->nextRetryAt = $values['nextRetryAt'] ?? null;
        $this->daysInDunning = $values['daysInDunning'];
        $this->accessRestricted = $values['accessRestricted'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
