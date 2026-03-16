<?php

namespace RevKeen\Meters\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Meters\Types\UpdateMeterRequestStatus;
use RevKeen\Core\Types\ArrayType;

class UpdateMeterRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Updated meter name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug Updated slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?string $description Updated description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<UpdateMeterRequestStatus> $status Meter status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $valueKey Updated value key
     */
    #[JsonProperty('value_key')]
    public ?string $valueKey;

    /**
     * @var ?array<array<string, mixed>> $filterConditions Updated filter conditions
     */
    #[JsonProperty('filter_conditions'), ArrayType([['string' => 'mixed']])]
    public ?array $filterConditions;

    /**
     * @var ?string $uniqueCountKey Updated unique count key
     */
    #[JsonProperty('unique_count_key')]
    public ?string $uniqueCountKey;

    /**
     * @var ?string $unitName Updated unit name
     */
    #[JsonProperty('unit_name')]
    public ?string $unitName;

    /**
     * @var ?bool $carryForward Updated carry forward setting
     */
    #[JsonProperty('carry_forward')]
    public ?bool $carryForward;

    /**
     * @var ?array<string, mixed> $metadata Updated metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name?: ?string,
     *   slug?: ?string,
     *   description?: ?string,
     *   status?: ?value-of<UpdateMeterRequestStatus>,
     *   valueKey?: ?string,
     *   filterConditions?: ?array<array<string, mixed>>,
     *   uniqueCountKey?: ?string,
     *   unitName?: ?string,
     *   carryForward?: ?bool,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->valueKey = $values['valueKey'] ?? null;
        $this->filterConditions = $values['filterConditions'] ?? null;
        $this->uniqueCountKey = $values['uniqueCountKey'] ?? null;
        $this->unitName = $values['unitName'] ?? null;
        $this->carryForward = $values['carryForward'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
