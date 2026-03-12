<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Subscriptions\Types\UpdateSubscriptionItemInputFulfillmentType;
use RevKeen\Core\Types\ArrayType;

class UpdateSubscriptionItemInput extends JsonSerializableType
{
    /**
     * @var ?int $quantity Item quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var ?string $description Item description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $unitAmountMinor Unit price in cents
     */
    #[JsonProperty('unit_amount_minor')]
    public ?int $unitAmountMinor;

    /**
     * @var ?value-of<UpdateSubscriptionItemInputFulfillmentType> $fulfillmentType Determines if orders are created on renewal
     */
    #[JsonProperty('fulfillment_type')]
    public ?string $fulfillmentType;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   quantity?: ?int,
     *   description?: ?string,
     *   unitAmountMinor?: ?int,
     *   fulfillmentType?: ?value-of<UpdateSubscriptionItemInputFulfillmentType>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->quantity = $values['quantity'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->unitAmountMinor = $values['unitAmountMinor'] ?? null;
        $this->fulfillmentType = $values['fulfillmentType'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
