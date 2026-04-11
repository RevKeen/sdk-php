<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomersUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?string $email Updated email address
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $name Updated full name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone Updated phone number
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?array<string, mixed> $metadata Metadata to merge with existing values (set a key to null to remove it)
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
     *   email?: ?string,
     *   name?: ?string,
     *   phone?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   customFields?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
    }
}
