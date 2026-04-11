<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutWinbackGetSummaryResponseByStatus extends JsonSerializableType
{
    /**
     * @var float $identified
     */
    #[JsonProperty('identified')]
    public float $identified;

    /**
     * @var float $contacted
     */
    #[JsonProperty('contacted')]
    public float $contacted;

    /**
     * @var float $converted
     */
    #[JsonProperty('converted')]
    public float $converted;

    /**
     * @var float $declined
     */
    #[JsonProperty('declined')]
    public float $declined;

    /**
     * @var float $expired
     */
    #[JsonProperty('expired')]
    public float $expired;

    /**
     * @param array{
     *   identified: float,
     *   contacted: float,
     *   converted: float,
     *   declined: float,
     *   expired: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->identified = $values['identified'];
        $this->contacted = $values['contacted'];
        $this->converted = $values['converted'];
        $this->declined = $values['declined'];
        $this->expired = $values['expired'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
