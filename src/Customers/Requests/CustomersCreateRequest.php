<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomersCreateRequest extends JsonSerializableType
{
    /**
     * @var string $email Customer's email address (must be unique per merchant)
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $name Customer's full name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone Customer's phone number
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary key-value metadata to attach to this customer
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $customFields Merchant-defined custom fields displayed as columns in the dashboard
     */
    #[JsonProperty('customFields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @param array{
     *   email: string,
     *   name?: ?string,
     *   phone?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   customFields?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
    }
}
