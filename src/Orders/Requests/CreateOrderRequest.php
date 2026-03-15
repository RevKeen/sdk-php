<?php

namespace RevKeen\Orders\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Orders\Types\CreateOrderRequestBillingType;
use RevKeen\Orders\Types\CreateOrderRequestLineItemsItem;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class CreateOrderRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Customer ID (optional for guest orders)
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?value-of<CreateOrderRequestBillingType> $billingType Billing type. one_time: Single purchase. recurring: Subscription-based.
     */
    #[JsonProperty('billing_type')]
    public ?string $billingType;

    /**
     * @var array<CreateOrderRequestLineItemsItem> $lineItems Order line items (at least one required)
     */
    #[JsonProperty('line_items'), ArrayType([CreateOrderRequestLineItemsItem::class])]
    public array $lineItems;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?DateTime $expiresAt Expiration timestamp for the order
     */
    #[JsonProperty('expires_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?string $invoiceId ID of the linked invoice (Commercial Truth)
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $subscriptionId ID of the linked subscription (for recurring fulfillment)
     */
    #[JsonProperty('subscription_id')]
    public ?string $subscriptionId;

    /**
     * @param array{
     *   lineItems: array<CreateOrderRequestLineItemsItem>,
     *   customerId?: ?string,
     *   currency?: ?string,
     *   billingType?: ?value-of<CreateOrderRequestBillingType>,
     *   metadata?: ?array<string, mixed>,
     *   notes?: ?string,
     *   expiresAt?: ?DateTime,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->billingType = $values['billingType'] ?? null;
        $this->lineItems = $values['lineItems'];
        $this->metadata = $values['metadata'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
    }
}
