<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreatePaymentLinkResponseLineItemsItem extends JsonSerializableType
{
    /**
     * @var string $productId
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var ?string $priceId
     */
    #[JsonProperty('price_id')]
    public ?string $priceId;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var ?string $merchantReference
     */
    #[JsonProperty('merchant_reference')]
    public ?string $merchantReference;

    /**
     * @var bool $isAdhoc
     */
    #[JsonProperty('is_adhoc')]
    public bool $isAdhoc;

    /**
     * @var ?CreatePaymentLinkResponseLineItemsItemProductDetails $productDetails
     */
    #[JsonProperty('product_details')]
    public ?CreatePaymentLinkResponseLineItemsItemProductDetails $productDetails;

    /**
     * @param array{
     *   productId: string,
     *   quantity: int,
     *   isAdhoc: bool,
     *   priceId?: ?string,
     *   merchantReference?: ?string,
     *   productDetails?: ?CreatePaymentLinkResponseLineItemsItemProductDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->productId = $values['productId'];
        $this->priceId = $values['priceId'] ?? null;
        $this->quantity = $values['quantity'];
        $this->merchantReference = $values['merchantReference'] ?? null;
        $this->isAdhoc = $values['isAdhoc'];
        $this->productDetails = $values['productDetails'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
