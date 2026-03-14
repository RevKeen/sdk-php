<?php

namespace RevKeen\Businesses\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PostBusinessesRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $companyNumber
     */
    #[JsonProperty('companyNumber')]
    public ?string $companyNumber;

    /**
     * @var ?string $taxIdentifier
     */
    #[JsonProperty('taxIdentifier')]
    public ?string $taxIdentifier;

    /**
     * @var ?string $billingEmail
     */
    #[JsonProperty('billingEmail')]
    public ?string $billingEmail;

    /**
     * @var ?string $billingPhone
     */
    #[JsonProperty('billingPhone')]
    public ?string $billingPhone;

    /**
     * @var ?string $billingAddressLine1
     */
    #[JsonProperty('billingAddressLine1')]
    public ?string $billingAddressLine1;

    /**
     * @var ?string $billingAddressLine2
     */
    #[JsonProperty('billingAddressLine2')]
    public ?string $billingAddressLine2;

    /**
     * @var ?string $billingCity
     */
    #[JsonProperty('billingCity')]
    public ?string $billingCity;

    /**
     * @var ?string $billingPostcode
     */
    #[JsonProperty('billingPostcode')]
    public ?string $billingPostcode;

    /**
     * @var ?string $billingCountry
     */
    #[JsonProperty('billingCountry')]
    public ?string $billingCountry;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name: string,
     *   customerId?: ?string,
     *   companyNumber?: ?string,
     *   taxIdentifier?: ?string,
     *   billingEmail?: ?string,
     *   billingPhone?: ?string,
     *   billingAddressLine1?: ?string,
     *   billingAddressLine2?: ?string,
     *   billingCity?: ?string,
     *   billingPostcode?: ?string,
     *   billingCountry?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->name = $values['name'];
        $this->companyNumber = $values['companyNumber'] ?? null;
        $this->taxIdentifier = $values['taxIdentifier'] ?? null;
        $this->billingEmail = $values['billingEmail'] ?? null;
        $this->billingPhone = $values['billingPhone'] ?? null;
        $this->billingAddressLine1 = $values['billingAddressLine1'] ?? null;
        $this->billingAddressLine2 = $values['billingAddressLine2'] ?? null;
        $this->billingCity = $values['billingCity'] ?? null;
        $this->billingPostcode = $values['billingPostcode'] ?? null;
        $this->billingCountry = $values['billingCountry'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
