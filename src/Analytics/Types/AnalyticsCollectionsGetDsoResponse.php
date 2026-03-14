<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCollectionsGetDsoResponse extends JsonSerializableType
{
    /**
     * @var float $dso
     */
    #[JsonProperty('dso')]
    public float $dso;

    /**
     * @var value-of<AnalyticsCollectionsGetDsoResponseTrend> $trend
     */
    #[JsonProperty('trend')]
    public string $trend;

    /**
     * @var ?float $previousDso
     */
    #[JsonProperty('previousDso')]
    public ?float $previousDso;

    /**
     * @var string $periodStart
     */
    #[JsonProperty('periodStart')]
    public string $periodStart;

    /**
     * @var string $periodEnd
     */
    #[JsonProperty('periodEnd')]
    public string $periodEnd;

    /**
     * @param array{
     *   dso: float,
     *   trend: value-of<AnalyticsCollectionsGetDsoResponseTrend>,
     *   periodStart: string,
     *   periodEnd: string,
     *   previousDso?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dso = $values['dso'];
        $this->trend = $values['trend'];
        $this->previousDso = $values['previousDso'] ?? null;
        $this->periodStart = $values['periodStart'];
        $this->periodEnd = $values['periodEnd'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
