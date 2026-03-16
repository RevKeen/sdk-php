<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreatePaymentLinkRequestLineItemsItem extends JsonSerializableType
{
    /**
     * @var ?string $price
     */
    #[JsonProperty('price')]
    public ?string $price;

    /**
     * @var ?CreatePaymentLinkRequestLineItemsItemPriceData $priceData
     */
    #[JsonProperty('price_data')]
    public ?CreatePaymentLinkRequestLineItemsItemPriceData $priceData;

    /**
     * @var ?int $quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var ?string $merchantReference
     */
    #[JsonProperty('merchant_reference')]
    public ?string $merchantReference;

    /**
     * @param array{
     *   price?: ?string,
     *   priceData?: ?CreatePaymentLinkRequestLineItemsItemPriceData,
     *   quantity?: ?int,
     *   merchantReference?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->price = $values['price'] ?? null;
        $this->priceData = $values['priceData'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->merchantReference = $values['merchantReference'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
