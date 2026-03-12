<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Event data containing the affected object
 */
class EventData extends JsonSerializableType
{
    /**
     * @var mixed $object The object that triggered the event (invoice, payment, etc.)
     */
    #[JsonProperty('object')]
    public mixed $object;

    /**
     * @var mixed $previousAttributes Previous values of attributes that changed (for update events)
     */
    #[JsonProperty('previous_attributes')]
    public mixed $previousAttributes;

    /**
     * @param array{
     *   object?: mixed,
     *   previousAttributes?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->object = $values['object'] ?? null;
        $this->previousAttributes = $values['previousAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
