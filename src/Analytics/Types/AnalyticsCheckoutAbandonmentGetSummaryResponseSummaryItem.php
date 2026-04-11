<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutAbandonmentGetSummaryResponseSummaryItem extends JsonSerializableType
{
    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $severity
     */
    #[JsonProperty('severity')]
    public string $severity;

    /**
     * @var float $alertCount
     */
    #[JsonProperty('alertCount')]
    public float $alertCount;

    /**
     * @var ?float $totalCartValueCents
     */
    #[JsonProperty('totalCartValueCents')]
    public ?float $totalCartValueCents;

    /**
     * @var ?float $avgCartValueCents
     */
    #[JsonProperty('avgCartValueCents')]
    public ?float $avgCartValueCents;

    /**
     * @var float $recoveryEmailsSent
     */
    #[JsonProperty('recoveryEmailsSent')]
    public float $recoveryEmailsSent;

    /**
     * @var float $recoveredCount
     */
    #[JsonProperty('recoveredCount')]
    public float $recoveredCount;

    /**
     * @param array{
     *   status: string,
     *   severity: string,
     *   alertCount: float,
     *   recoveryEmailsSent: float,
     *   recoveredCount: float,
     *   totalCartValueCents?: ?float,
     *   avgCartValueCents?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->severity = $values['severity'];
        $this->alertCount = $values['alertCount'];
        $this->totalCartValueCents = $values['totalCartValueCents'] ?? null;
        $this->avgCartValueCents = $values['avgCartValueCents'] ?? null;
        $this->recoveryEmailsSent = $values['recoveryEmailsSent'];
        $this->recoveredCount = $values['recoveredCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
