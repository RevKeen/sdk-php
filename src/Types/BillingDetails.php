<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Billing details associated with the payment method
 */
class BillingDetails extends JsonSerializableType
{
    /**
     * @var ?string $name Full name on the payment method
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $email Email address
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $phone Phone number
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?BillingDetailsAddress $address Billing address
     */
    #[JsonProperty('address')]
    public ?BillingDetailsAddress $address;

    /**
     * @param array{
     *   name?: ?string,
     *   email?: ?string,
     *   phone?: ?string,
     *   address?: ?BillingDetailsAddress,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
