<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;

class AnalyticsCheckoutGetFunnelRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $startDate Start date for analytics period (ISO 8601)
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate End date for analytics period (ISO 8601)
     */
    public ?DateTime $endDate;

    /**
     * @param array{
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
    }
}
