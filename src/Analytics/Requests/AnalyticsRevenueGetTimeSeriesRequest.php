<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;
use RevKeen\Analytics\Types\AnalyticsRevenueGetTimeSeriesRequestGranularity;

class AnalyticsRevenueGetTimeSeriesRequest extends JsonSerializableType
{
    /**
     * @var DateTime $startDate Start date (ISO 8601)
     */
    public DateTime $startDate;

    /**
     * @var DateTime $endDate End date (ISO 8601)
     */
    public DateTime $endDate;

    /**
     * @var ?value-of<AnalyticsRevenueGetTimeSeriesRequestGranularity> $granularity Time granularity for data points
     */
    public ?string $granularity;

    /**
     * @param array{
     *   startDate: DateTime,
     *   endDate: DateTime,
     *   granularity?: ?value-of<AnalyticsRevenueGetTimeSeriesRequestGranularity>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'];
        $this->granularity = $values['granularity'] ?? null;
    }
}
