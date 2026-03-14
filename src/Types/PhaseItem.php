<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PhaseItem extends JsonSerializableType
{
    /**
     * @var string $priceId Price ID for this item
     */
    #[JsonProperty('price_id')]
    public string $priceId;

    /**
     * @var ?int $quantity Quantity of this item
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @param array{
     *   priceId: string,
     *   quantity?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->priceId = $values['priceId'];
        $this->quantity = $values['quantity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
