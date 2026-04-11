<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A line item within an order, representing a product, quantity, and unit price.
 */
class OrderLineItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var int $unitPrice Unit price in cents
     */
    #[JsonProperty('unit_price')]
    public int $unitPrice;

    /**
     * @var int $subtotal Subtotal in cents (unit_price * quantity)
     */
    #[JsonProperty('subtotal')]
    public int $subtotal;

    /**
     * @var ?int $discount Discount in cents
     */
    #[JsonProperty('discount')]
    public ?int $discount;

    /**
     * @var ?int $tax Tax in cents
     */
    #[JsonProperty('tax')]
    public ?int $tax;

    /**
     * @var int $total Total in cents (subtotal - discount + tax)
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?int $position
     */
    #[JsonProperty('position')]
    public ?int $position;

    /**
     * @param array{
     *   id: string,
     *   description: string,
     *   quantity: int,
     *   unitPrice: int,
     *   subtotal: int,
     *   total: int,
     *   productId?: ?string,
     *   discount?: ?int,
     *   tax?: ?int,
     *   metadata?: ?array<string, mixed>,
     *   position?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->productId = $values['productId'] ?? null;
        $this->description = $values['description'];
        $this->quantity = $values['quantity'];
        $this->unitPrice = $values['unitPrice'];
        $this->subtotal = $values['subtotal'];
        $this->discount = $values['discount'] ?? null;
        $this->tax = $values['tax'] ?? null;
        $this->total = $values['total'];
        $this->metadata = $values['metadata'] ?? null;
        $this->position = $values['position'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
