<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsRevenueGetTimeSeriesResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsRevenueGetTimeSeriesResponseDataPointsItem> $dataPoints
     */
    #[JsonProperty('dataPoints'), ArrayType([AnalyticsRevenueGetTimeSeriesResponseDataPointsItem::class])]
    public array $dataPoints;

    /**
     * @var float $totalRevenue
     */
    #[JsonProperty('totalRevenue')]
    public float $totalRevenue;

    /**
     * @var float $totalInvoices
     */
    #[JsonProperty('totalInvoices')]
    public float $totalInvoices;

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
     *   dataPoints: array<AnalyticsRevenueGetTimeSeriesResponseDataPointsItem>,
     *   totalRevenue: float,
     *   totalInvoices: float,
     *   periodStart: string,
     *   periodEnd: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dataPoints = $values['dataPoints'];
        $this->totalRevenue = $values['totalRevenue'];
        $this->totalInvoices = $values['totalInvoices'];
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
