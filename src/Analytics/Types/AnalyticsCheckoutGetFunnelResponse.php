<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCheckoutGetFunnelResponse extends JsonSerializableType
{
    /**
     * @var string $startDate
     */
    #[JsonProperty('startDate')]
    public string $startDate;

    /**
     * @var string $endDate
     */
    #[JsonProperty('endDate')]
    public string $endDate;

    /**
     * @var float $totalSessions
     */
    #[JsonProperty('totalSessions')]
    public float $totalSessions;

    /**
     * @var float $completedSessions
     */
    #[JsonProperty('completedSessions')]
    public float $completedSessions;

    /**
     * @var float $overallConversionRate
     */
    #[JsonProperty('overallConversionRate')]
    public float $overallConversionRate;

    /**
     * @var array<AnalyticsCheckoutGetFunnelResponseStepsItem> $steps
     */
    #[JsonProperty('steps'), ArrayType([AnalyticsCheckoutGetFunnelResponseStepsItem::class])]
    public array $steps;

    /**
     * @param array{
     *   startDate: string,
     *   endDate: string,
     *   totalSessions: float,
     *   completedSessions: float,
     *   overallConversionRate: float,
     *   steps: array<AnalyticsCheckoutGetFunnelResponseStepsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'];
        $this->totalSessions = $values['totalSessions'];
        $this->completedSessions = $values['completedSessions'];
        $this->overallConversionRate = $values['overallConversionRate'];
        $this->steps = $values['steps'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
