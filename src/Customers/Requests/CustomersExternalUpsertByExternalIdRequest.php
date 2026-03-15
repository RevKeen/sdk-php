<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class CustomersExternalUpsertByExternalIdRequest extends JsonSerializableType
{
    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $addressLine1
     */
    #[JsonProperty('address_line1')]
    public ?string $addressLine1;

    /**
     * @var ?string $addressLine2
     */
    #[JsonProperty('address_line2')]
    public ?string $addressLine2;

    /**
     * @var ?string $city
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $postalCode
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $taxId
     */
    #[JsonProperty('tax_id')]
    public ?string $taxId;

    /**
     * @var ?string $taxIdCountry
     */
    #[JsonProperty('tax_id_country')]
    public ?string $taxIdCountry;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $customFields Custom fields
     */
    #[JsonProperty('custom_fields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @var ?DateTime $externalUpdatedAt
     */
    #[JsonProperty('external_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @param array{
     *   email: string,
     *   name?: ?string,
     *   phone?: ?string,
     *   addressLine1?: ?string,
     *   addressLine2?: ?string,
     *   city?: ?string,
     *   state?: ?string,
     *   postalCode?: ?string,
     *   country?: ?string,
     *   taxId?: ?string,
     *   taxIdCountry?: ?string,
     *   notes?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   customFields?: ?array<string, mixed>,
     *   externalUpdatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->addressLine1 = $values['addressLine1'] ?? null;
        $this->addressLine2 = $values['addressLine2'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->postalCode = $values['postalCode'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->taxId = $values['taxId'] ?? null;
        $this->taxIdCountry = $values['taxIdCountry'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
    }
}
