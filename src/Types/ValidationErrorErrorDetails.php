<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ValidationErrorErrorDetails extends JsonSerializableType
{
    /**
     * @var ?array<string, array<string>> $fields Field-specific validation errors
     */
    #[JsonProperty('fields'), ArrayType(['string' => ['string']])]
    public ?array $fields;

    /**
     * @param array{
     *   fields?: ?array<string, array<string>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
