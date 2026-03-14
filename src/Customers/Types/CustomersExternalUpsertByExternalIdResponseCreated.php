<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomersExternalUpsertByExternalIdResponseCreated extends JsonSerializableType
{
    /**
     * @var CustomersExternalUpsertByExternalIdResponseCreatedData $data
     */
    #[JsonProperty('data')]
    public CustomersExternalUpsertByExternalIdResponseCreatedData $data;

    /**
     * @var bool $created
     */
    #[JsonProperty('created')]
    public bool $created;

    /**
     * @var ?array<string> $warnings
     */
    #[JsonProperty('warnings'), ArrayType(['string'])]
    public ?array $warnings;

    /**
     * @param array{
     *   data: CustomersExternalUpsertByExternalIdResponseCreatedData,
     *   created: bool,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->created = $values['created'];
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
