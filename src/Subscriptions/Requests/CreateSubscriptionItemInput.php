<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Subscriptions\Types\CreateSubscriptionItemInputFulfillmentType;
use RevKeen\Core\Types\ArrayType;

class CreateSubscriptionItemInput extends JsonSerializableType
{
    /**
     * @var ?string $productId Product UUID to link to this item
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $priceId Price UUID to link to this item
     */
    #[JsonProperty('price_id')]
    public ?string $priceId;

    /**
     * @var ?string $description Item description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $quantity Item quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $unitAmountMinor Unit price in cents
     */
    #[JsonProperty('unit_amount_minor')]
    public int $unitAmountMinor;

    /**
     * @var ?value-of<CreateSubscriptionItemInputFulfillmentType> $fulfillmentType Determines if orders are created on renewal
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
     *   currency: string,
     *   unitAmountMinor: int,
     *   productId?: ?string,
     *   priceId?: ?string,
     *   description?: ?string,
     *   quantity?: ?int,
     *   fulfillmentType?: ?value-of<CreateSubscriptionItemInputFulfillmentType>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->productId = $values['productId'] ?? null;
        $this->priceId = $values['priceId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->currency = $values['currency'];
        $this->unitAmountMinor = $values['unitAmountMinor'];
        $this->fulfillmentType = $values['fulfillmentType'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
