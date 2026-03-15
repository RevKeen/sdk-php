<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;

class AnalyticsInvoicesGetArAgingRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $asOfDate Calculate aging as of this date (ISO 8601)
     */
    public ?DateTime $asOfDate;

    /**
     * @param array{
     *   asOfDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->asOfDate = $values['asOfDate'] ?? null;
    }
}
