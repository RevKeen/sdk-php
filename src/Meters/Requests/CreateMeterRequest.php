<?php

namespace RevKeen\Meters\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Meters\Types\CreateMeterRequestAggregation;
use RevKeen\Core\Types\ArrayType;

class CreateMeterRequest extends JsonSerializableType
{
    /**
     * @var string $name Human-readable meter name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $eventName Event name to match against
     */
    #[JsonProperty('event_name')]
    public string $eventName;

    /**
     * @var ?value-of<CreateMeterRequestAggregation> $aggregation Aggregation method
     */
    #[JsonProperty('aggregation')]
    public ?string $aggregation;

    /**
     * @var ?string $slug URL-safe identifier
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?string $description Meter description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $valueKey Property key for sum/max/last aggregations
     */
    #[JsonProperty('value_key')]
    public ?string $valueKey;

    /**
     * @var ?array<array<string, mixed>> $filterConditions Filter conditions for matching events
     */
    #[JsonProperty('filter_conditions'), ArrayType([['string' => 'mixed']])]
    public ?array $filterConditions;

    /**
     * @var ?string $uniqueCountKey Property key for count_unique aggregation
     */
    #[JsonProperty('unique_count_key')]
    public ?string $uniqueCountKey;

    /**
     * @var ?string $unitName Display unit name
     */
    #[JsonProperty('unit_name')]
    public ?string $unitName;

    /**
     * @var ?bool $carryForward Carry forward last value across periods
     */
    #[JsonProperty('carry_forward')]
    public ?bool $carryForward;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name: string,
     *   eventName: string,
     *   aggregation?: ?value-of<CreateMeterRequestAggregation>,
     *   slug?: ?string,
     *   description?: ?string,
     *   valueKey?: ?string,
     *   filterConditions?: ?array<array<string, mixed>>,
     *   uniqueCountKey?: ?string,
     *   unitName?: ?string,
     *   carryForward?: ?bool,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->eventName = $values['eventName'];
        $this->aggregation = $values['aggregation'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->valueKey = $values['valueKey'] ?? null;
        $this->filterConditions = $values['filterConditions'] ?? null;
        $this->uniqueCountKey = $values['uniqueCountKey'] ?? null;
        $this->unitName = $values['unitName'] ?? null;
        $this->carryForward = $values['carryForward'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
