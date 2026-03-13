<?php

namespace RevKeen\TaxRates\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\TaxRates\Types\CreateTaxRateRequestTaxType;
use RevKeen\Core\Types\ArrayType;

class CreateTaxRateRequest extends JsonSerializableType
{
    /**
     * @var string $displayName Display name for the tax rate
     */
    #[JsonProperty('display_name')]
    public string $displayName;

    /**
     * @var ?string $description Description of the tax rate
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $jurisdiction Tax jurisdiction (e.g., 'US-CA', 'DE', 'GB')
     */
    #[JsonProperty('jurisdiction')]
    public ?string $jurisdiction;

    /**
     * @var float $percentage Tax percentage (e.g., 8.25 for 8.25%)
     */
    #[JsonProperty('percentage')]
    public float $percentage;

    /**
     * @var ?bool $inclusive Whether tax is included in displayed price
     */
    #[JsonProperty('inclusive')]
    public ?bool $inclusive;

    /**
     * @var ?value-of<CreateTaxRateRequestTaxType> $taxType Type of tax
     */
    #[JsonProperty('tax_type')]
    public ?string $taxType;

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
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   displayName: string,
     *   percentage: float,
     *   description?: ?string,
     *   jurisdiction?: ?string,
     *   inclusive?: ?bool,
     *   taxType?: ?value-of<CreateTaxRateRequestTaxType>,
     *   country?: ?string,
     *   state?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->displayName = $values['displayName'];
        $this->description = $values['description'] ?? null;
        $this->jurisdiction = $values['jurisdiction'] ?? null;
        $this->percentage = $values['percentage'];
        $this->inclusive = $values['inclusive'] ?? null;
        $this->taxType = $values['taxType'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
