<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ListPaymentLinksResponseDataItemLineItemsItemProductDetails extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var int $unitAmount
     */
    #[JsonProperty('unit_amount')]
    public int $unitAmount;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?ListPaymentLinksResponseDataItemLineItemsItemProductDetailsRecurring $recurring
     */
    #[JsonProperty('recurring')]
    public ?ListPaymentLinksResponseDataItemLineItemsItemProductDetailsRecurring $recurring;

    /**
     * @param array{
     *   name: string,
     *   unitAmount: int,
     *   currency: string,
     *   description?: ?string,
     *   recurring?: ?ListPaymentLinksResponseDataItemLineItemsItemProductDetailsRecurring,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->unitAmount = $values['unitAmount'];
        $this->currency = $values['currency'];
        $this->recurring = $values['recurring'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
