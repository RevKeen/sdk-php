<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Event payload containing the affected object
 */
class WebhookEventData extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $object The object that triggered the event (e.g., Payment, Invoice, Subscription)
     */
    #[JsonProperty('object'), ArrayType(['string' => 'mixed'])]
    public ?array $object;

    /**
     * @var ?array<string, mixed> $previousAttributes Previous values of attributes that changed (for update events)
     */
    #[JsonProperty('previous_attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $previousAttributes;

    /**
     * @param array{
     *   object?: ?array<string, mixed>,
     *   previousAttributes?: ?array<string, mixed>,
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
