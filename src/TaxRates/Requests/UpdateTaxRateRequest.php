<?php

namespace RevKeen\TaxRates\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UpdateTaxRateRequest extends JsonSerializableType
{
    /**
     * @var ?string $displayName Display name for the tax rate
     */
    #[JsonProperty('display_name')]
    public ?string $displayName;

    /**
     * @var ?string $description Description of the tax rate
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $jurisdiction Tax jurisdiction
     */
    #[JsonProperty('jurisdiction')]
    public ?string $jurisdiction;

    /**
     * @var ?string $country ISO 2-letter country code
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $state State/province code
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?bool $active Whether the tax rate is active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   displayName?: ?string,
     *   description?: ?string,
     *   jurisdiction?: ?string,
     *   country?: ?string,
     *   state?: ?string,
     *   active?: ?bool,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->displayName = $values['displayName'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->jurisdiction = $values['jurisdiction'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
