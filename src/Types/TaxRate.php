<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class TaxRate extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the tax rate
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<TaxRateObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

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
     * @var bool $inclusive Whether tax is included in displayed price (EU style)
     */
    #[JsonProperty('inclusive')]
    public bool $inclusive;

    /**
     * @var value-of<TaxRateTaxType> $taxType Type of tax
     */
    #[JsonProperty('tax_type')]
    public string $taxType;

    /**
     * @var ?string $country ISO country code
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $state State/province code
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var bool $active Whether the tax rate is active
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var DateTime $createdAt Creation timestamp
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update timestamp
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<TaxRateObject>,
     *   displayName: string,
     *   percentage: float,
     *   inclusive: bool,
     *   taxType: value-of<TaxRateTaxType>,
     *   active: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   jurisdiction?: ?string,
     *   country?: ?string,
     *   state?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->displayName = $values['displayName'];
        $this->description = $values['description'] ?? null;
        $this->jurisdiction = $values['jurisdiction'] ?? null;
        $this->percentage = $values['percentage'];
        $this->inclusive = $values['inclusive'];
        $this->taxType = $values['taxType'];
        $this->country = $values['country'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->active = $values['active'];
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
