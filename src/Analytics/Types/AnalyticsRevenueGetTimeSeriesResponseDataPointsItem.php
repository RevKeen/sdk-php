<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsRevenueGetTimeSeriesResponseDataPointsItem extends JsonSerializableType
{
    /**
     * @var string $date
     */
    #[JsonProperty('date')]
    public string $date;

    /**
     * @var float $revenue
     */
    #[JsonProperty('revenue')]
    public float $revenue;

    /**
     * @var float $invoiceCount
     */
    #[JsonProperty('invoiceCount')]
    public float $invoiceCount;

    /**
     * @var float $avgInvoiceValue
     */
    #[JsonProperty('avgInvoiceValue')]
    public float $avgInvoiceValue;

    /**
     * @param array{
     *   date: string,
     *   revenue: float,
     *   invoiceCount: float,
     *   avgInvoiceValue: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->date = $values['date'];
        $this->revenue = $values['revenue'];
        $this->invoiceCount = $values['invoiceCount'];
        $this->avgInvoiceValue = $values['avgInvoiceValue'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
