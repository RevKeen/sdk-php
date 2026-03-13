<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class CustomersExternalBatchRequestCustomersItem extends JsonSerializableType
{
    /**
     * @var string $externalId External system's customer ID
     */
    #[JsonProperty('external_id')]
    public string $externalId;

    /**
     * @var string $email Customer email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $name Customer name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone Customer phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $addressLine1 Address line 1
     */
    #[JsonProperty('address_line1')]
    public ?string $addressLine1;

    /**
     * @var ?string $addressLine2 Address line 2
     */
    #[JsonProperty('address_line2')]
    public ?string $addressLine2;

    /**
     * @var ?string $city City
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $state State/Province
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $postalCode Postal code
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $country Country code (ISO 3166-1 alpha-2)
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $taxId Tax ID
     */
    #[JsonProperty('tax_id')]
    public ?string $taxId;

    /**
     * @var ?string $taxIdCountry Country for tax ID
     */
    #[JsonProperty('tax_id_country')]
    public ?string $taxIdCountry;

    /**
     * @var ?string $notes Customer notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?DateTime $externalUpdatedAt External system's last update timestamp for stale update protection
     */
    #[JsonProperty('external_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @param array{
     *   externalId: string,
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
     *   externalUpdatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
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
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
