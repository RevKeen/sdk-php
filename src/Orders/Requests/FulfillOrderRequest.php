<?php

namespace RevKeen\Orders\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class FulfillOrderRequest extends JsonSerializableType
{
    /**
     * @var ?string $trackingNumber Shipping tracking number
     */
    #[JsonProperty('tracking_number')]
    public ?string $trackingNumber;

    /**
     * @var ?string $carrier Shipping carrier (e.g., 'ups', 'fedex', 'usps')
     */
    #[JsonProperty('carrier')]
    public ?string $carrier;

    /**
     * @var ?array<string> $lineItemIds Specific line items to fulfill (defaults to all)
     */
    #[JsonProperty('line_item_ids'), ArrayType(['string'])]
    public ?array $lineItemIds;

    /**
     * @var ?bool $notifyCustomer Send fulfillment notification to customer
     */
    #[JsonProperty('notify_customer')]
    public ?bool $notifyCustomer;

    /**
     * @param array{
     *   trackingNumber?: ?string,
     *   carrier?: ?string,
     *   lineItemIds?: ?array<string>,
     *   notifyCustomer?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->carrier = $values['carrier'] ?? null;
        $this->lineItemIds = $values['lineItemIds'] ?? null;
        $this->notifyCustomer = $values['notifyCustomer'] ?? null;
    }
}
