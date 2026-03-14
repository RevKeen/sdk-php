<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ListPaymentLinksResponseDataItemLineItemsItem extends JsonSerializableType
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
     * @var ?ListPaymentLinksResponseDataItemLineItemsItemProductDetails $productDetails
     */
    #[JsonProperty('product_details')]
    public ?ListPaymentLinksResponseDataItemLineItemsItemProductDetails $productDetails;

    /**
     * @param array{
     *   productId: string,
     *   quantity: int,
     *   isAdhoc: bool,
     *   priceId?: ?string,
     *   merchantReference?: ?string,
     *   productDetails?: ?ListPaymentLinksResponseDataItemLineItemsItemProductDetails,
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
