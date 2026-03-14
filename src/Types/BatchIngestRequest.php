<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class BatchIngestRequest extends JsonSerializableType
{
    /**
     * @var array<UsageEvent> $events Array of usage events (1–1000)
     */
    #[JsonProperty('events'), ArrayType([UsageEvent::class])]
    public array $events;

    /**
     * @param array{
     *   events: array<UsageEvent>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->events = $values['events'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
