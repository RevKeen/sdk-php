<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Response from an external system upsert, indicating whether the invoice was created or updated along with any warnings.
 */
class ExternalUpsertResponse extends JsonSerializableType
{
    /**
     * @var Invoice $data
     */
    #[JsonProperty('data')]
    public Invoice $data;

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
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: Invoice,
     *   created: bool,
     *   requestId: string,
     *   warnings?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->created = $values['created'];
        $this->warnings = $values['warnings'] ?? null;
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
