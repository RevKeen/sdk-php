<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SubscriptionItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $subscriptionId
     */
    #[JsonProperty('subscription_id')]
    public string $subscriptionId;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $priceId
     */
    #[JsonProperty('price_id')]
    public ?string $priceId;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var int $quantity Item quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $unitAmountMinor Unit price in cents
     */
    #[JsonProperty('unit_amount_minor')]
    public int $unitAmountMinor;

    /**
     * @var value-of<SubscriptionItemFulfillmentType> $fulfillmentType none: service (no order), physical: creates shipping order, digital: creates download order
     */
    #[JsonProperty('fulfillment_type')]
    public string $fulfillmentType;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   subscriptionId: string,
     *   quantity: int,
     *   currency: string,
     *   unitAmountMinor: int,
     *   fulfillmentType: value-of<SubscriptionItemFulfillmentType>,
     *   createdAt: string,
     *   updatedAt: string,
     *   productId?: ?string,
     *   priceId?: ?string,
     *   description?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->subscriptionId = $values['subscriptionId'];
        $this->productId = $values['productId'] ?? null;
        $this->priceId = $values['priceId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->quantity = $values['quantity'];
        $this->currency = $values['currency'];
        $this->unitAmountMinor = $values['unitAmountMinor'];
        $this->fulfillmentType = $values['fulfillmentType'];
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
