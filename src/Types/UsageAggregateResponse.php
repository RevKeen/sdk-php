<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Aggregated usage totals grouped by meter and time period.
 */
class UsageAggregateResponse extends JsonSerializableType
{
    /**
     * @var value-of<UsageAggregateResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $meterId
     */
    #[JsonProperty('meter_id')]
    public string $meterId;

    /**
     * @var string $startTime
     */
    #[JsonProperty('start_time')]
    public string $startTime;

    /**
     * @var string $endTime
     */
    #[JsonProperty('end_time')]
    public string $endTime;

    /**
     * @var float $value Aggregated usage value
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @var float $eventCount Number of events in range
     */
    #[JsonProperty('event_count')]
    public float $eventCount;

    /**
     * @param array{
     *   object: value-of<UsageAggregateResponseObject>,
     *   meterId: string,
     *   startTime: string,
     *   endTime: string,
     *   value: float,
     *   eventCount: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->meterId = $values['meterId'];
        $this->startTime = $values['startTime'];
        $this->endTime = $values['endTime'];
        $this->value = $values['value'];
        $this->eventCount = $values['eventCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
