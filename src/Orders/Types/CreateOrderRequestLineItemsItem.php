<?php

namespace RevKeen\Orders\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CreateOrderRequestLineItemsItem extends JsonSerializableType
{
    /**
     * @var ?string $productId Product ID (optional for ad-hoc items)
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?int $quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var int $unitPrice Unit price in cents
     */
    #[JsonProperty('unit_price')]
    public int $unitPrice;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   description: string,
     *   unitPrice: int,
     *   productId?: ?string,
     *   quantity?: ?int,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->productId = $values['productId'] ?? null;
        $this->description = $values['description'];
        $this->quantity = $values['quantity'] ?? null;
        $this->unitPrice = $values['unitPrice'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
