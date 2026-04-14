<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Current phase being executed
 */
class SubscriptionScheduleCurrentPhase extends JsonSerializableType
{
    /**
     * @var int $startDate Phase start (Unix timestamp)
     */
    #[JsonProperty('start_date')]
    public int $startDate;

    /**
     * @var ?int $endDate Phase end (Unix timestamp)
     */
    #[JsonProperty('end_date')]
    public ?int $endDate;

    /**
     * @param array{
     *   startDate: int,
     *   endDate?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
