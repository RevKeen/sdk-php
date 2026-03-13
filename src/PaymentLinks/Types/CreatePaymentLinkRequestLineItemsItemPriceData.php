<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreatePaymentLinkRequestLineItemsItemPriceData extends JsonSerializableType
{
    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var int $unitAmount
     */
    #[JsonProperty('unit_amount')]
    public int $unitAmount;

    /**
     * @var ?CreatePaymentLinkRequestLineItemsItemPriceDataProductData $productData
     */
    #[JsonProperty('product_data')]
    public ?CreatePaymentLinkRequestLineItemsItemPriceDataProductData $productData;

    /**
     * @var ?string $product
     */
    #[JsonProperty('product')]
    public ?string $product;

    /**
     * @var ?CreatePaymentLinkRequestLineItemsItemPriceDataRecurring $recurring
     */
    #[JsonProperty('recurring')]
    public ?CreatePaymentLinkRequestLineItemsItemPriceDataRecurring $recurring;

    /**
     * @var ?value-of<CreatePaymentLinkRequestLineItemsItemPriceDataTaxBehavior> $taxBehavior
     */
    #[JsonProperty('tax_behavior')]
    public ?string $taxBehavior;

    /**
     * @param array{
     *   unitAmount: int,
     *   currency?: ?string,
     *   productData?: ?CreatePaymentLinkRequestLineItemsItemPriceDataProductData,
     *   product?: ?string,
     *   recurring?: ?CreatePaymentLinkRequestLineItemsItemPriceDataRecurring,
     *   taxBehavior?: ?value-of<CreatePaymentLinkRequestLineItemsItemPriceDataTaxBehavior>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currency = $values['currency'] ?? null;
        $this->unitAmount = $values['unitAmount'];
        $this->productData = $values['productData'] ?? null;
        $this->product = $values['product'] ?? null;
        $this->recurring = $values['recurring'] ?? null;
        $this->taxBehavior = $values['taxBehavior'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
