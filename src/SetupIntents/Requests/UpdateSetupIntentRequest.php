<?php

namespace RevKeen\SetupIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UpdateSetupIntentRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId ID of the customer to attach the payment method to
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?array<string> $paymentMethodTypes Allowed payment method types
     */
    #[JsonProperty('payment_method_types'), ArrayType(['string'])]
    public ?array $paymentMethodTypes;

    /**
     * @var ?string $description Merchant description for reference
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata to attach
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   customerId?: ?string,
     *   paymentMethodTypes?: ?array<string>,
     *   description?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->paymentMethodTypes = $values['paymentMethodTypes'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
