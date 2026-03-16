<?php

namespace RevKeen\Invoices\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesExternalBatchRequestInvoicesItemLineItemsItem extends JsonSerializableType
{
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
     * @var int $unitAmountMinor
     */
    #[JsonProperty('unit_amount_minor')]
    public int $unitAmountMinor;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @param array{
     *   description: string,
     *   unitAmountMinor: int,
     *   quantity?: ?int,
     *   productId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'];
        $this->quantity = $values['quantity'] ?? null;
        $this->unitAmountMinor = $values['unitAmountMinor'];
        $this->productId = $values['productId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
