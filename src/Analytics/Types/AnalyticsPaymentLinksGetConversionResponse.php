<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsPaymentLinksGetConversionResponse extends JsonSerializableType
{
    /**
     * @var float $totalLinks
     */
    #[JsonProperty('totalLinks')]
    public float $totalLinks;

    /**
     * @var float $viewCount
     */
    #[JsonProperty('viewCount')]
    public float $viewCount;

    /**
     * @var float $conversionCount
     */
    #[JsonProperty('conversionCount')]
    public float $conversionCount;

    /**
     * @var float $conversionRate
     */
    #[JsonProperty('conversionRate')]
    public float $conversionRate;

    /**
     * @var float $totalRevenue
     */
    #[JsonProperty('totalRevenue')]
    public float $totalRevenue;

    /**
     * @var float $avgRevenuePerConversion
     */
    #[JsonProperty('avgRevenuePerConversion')]
    public float $avgRevenuePerConversion;

    /**
     * @param array{
     *   totalLinks: float,
     *   viewCount: float,
     *   conversionCount: float,
     *   conversionRate: float,
     *   totalRevenue: float,
     *   avgRevenuePerConversion: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalLinks = $values['totalLinks'];
        $this->viewCount = $values['viewCount'];
        $this->conversionCount = $values['conversionCount'];
        $this->conversionRate = $values['conversionRate'];
        $this->totalRevenue = $values['totalRevenue'];
        $this->avgRevenuePerConversion = $values['avgRevenuePerConversion'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
