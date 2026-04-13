<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * An order represents a one-off purchase with lifecycle operations: create, pay, cancel, and fulfill.
 */
class Order extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the order
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<OrderObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $publicId Public-facing order ID
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var ?string $customerId ID of the customer
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var value-of<OrderStatus> $status Order status. draft: Being built. pending: Awaiting payment. paid: Fully paid. partially_paid: Partial payment received. refunded: Refunded. canceled: Canceled. fulfilled: Shipped/delivered.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<OrderBillingType> $billingType Billing type. one_time: Single purchase. recurring: Subscription-based.
     */
    #[JsonProperty('billing_type')]
    public string $billingType;

    /**
     * @var ?value-of<OrderFulfillmentStatus> $fulfillmentStatus Fulfillment status for physical goods.
     */
    #[JsonProperty('fulfillment_status')]
    public ?string $fulfillmentStatus;

    /**
     * @var string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $subtotal Subtotal in cents
     */
    #[JsonProperty('subtotal')]
    public int $subtotal;

    /**
     * @var int $discount Total discount in cents
     */
    #[JsonProperty('discount')]
    public int $discount;

    /**
     * @var int $tax Total tax in cents
     */
    #[JsonProperty('tax')]
    public int $tax;

    /**
     * @var int $total Total amount in cents
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $amountPaid Amount paid in cents
     */
    #[JsonProperty('amount_paid')]
    public int $amountPaid;

    /**
     * @var int $amountRefunded Amount refunded in cents
     */
    #[JsonProperty('amount_refunded')]
    public int $amountRefunded;

    /**
     * @var int $amountDue Amount still due in cents
     */
    #[JsonProperty('amount_due')]
    public int $amountDue;

    /**
     * @var ?array<OrderLineItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([OrderLineItem::class])]
    public ?array $lineItems;

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
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?DateTime $paidAt
     */
    #[JsonProperty('paid_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $paidAt;

    /**
     * @var ?DateTime $canceledAt
     */
    #[JsonProperty('canceled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var ?DateTime $fulfilledAt
     */
    #[JsonProperty('fulfilled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $fulfilledAt;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expires_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<OrderObject>,
     *   publicId: string,
     *   status: value-of<OrderStatus>,
     *   billingType: value-of<OrderBillingType>,
     *   currency: string,
     *   subtotal: int,
     *   discount: int,
     *   tax: int,
     *   total: int,
     *   amountPaid: int,
     *   amountRefunded: int,
     *   amountDue: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   customerId?: ?string,
     *   fulfillmentStatus?: ?value-of<OrderFulfillmentStatus>,
     *   lineItems?: ?array<OrderLineItem>,
     *   metadata?: ?array<string, mixed>,
     *   notes?: ?string,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     *   paidAt?: ?DateTime,
     *   canceledAt?: ?DateTime,
     *   fulfilledAt?: ?DateTime,
     *   expiresAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->publicId = $values['publicId'];
        $this->customerId = $values['customerId'] ?? null;
        $this->status = $values['status'];
        $this->billingType = $values['billingType'];
        $this->fulfillmentStatus = $values['fulfillmentStatus'] ?? null;
        $this->currency = $values['currency'];
        $this->subtotal = $values['subtotal'];
        $this->discount = $values['discount'];
        $this->tax = $values['tax'];
        $this->total = $values['total'];
        $this->amountPaid = $values['amountPaid'];
        $this->amountRefunded = $values['amountRefunded'];
        $this->amountDue = $values['amountDue'];
        $this->lineItems = $values['lineItems'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->paidAt = $values['paidAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->fulfilledAt = $values['fulfilledAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
