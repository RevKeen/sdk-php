<?php

namespace RevKeen\Invoices\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Types\SubscriptionTerms;
use DateTime;
use RevKeen\Core\Types\Date;

class InvoicesExternalBatchRequestInvoicesItem extends JsonSerializableType
{
    /**
     * @var string $externalId External system's invoice ID
     */
    #[JsonProperty('external_id')]
    public string $externalId;

    /**
     * @var ?InvoicesExternalBatchRequestInvoicesItemCustomerExternalRef $customerExternalRef Customer external reference for lookup. Either this or customer_uuid is required.
     */
    #[JsonProperty('customer_external_ref')]
    public ?InvoicesExternalBatchRequestInvoicesItemCustomerExternalRef $customerExternalRef;

    /**
     * @var ?string $customerUuid Direct customer UUID (if already resolved)
     */
    #[JsonProperty('customer_uuid')]
    public ?string $customerUuid;

    /**
     * @var ?string $invoiceNumber
     */
    #[JsonProperty('invoice_number')]
    public ?string $invoiceNumber;

    /**
     * @var ?int $totalMinor Total amount in minor units (cents)
     */
    #[JsonProperty('total_minor')]
    public ?int $totalMinor;

    /**
     * @var ?int $subtotalMinor Subtotal in minor units (before tax)
     */
    #[JsonProperty('subtotal_minor')]
    public ?int $subtotalMinor;

    /**
     * @var ?int $taxMinor Tax amount in minor units
     */
    #[JsonProperty('tax_minor')]
    public ?int $taxMinor;

    /**
     * @var ?int $discountMinor Discount amount in minor units
     */
    #[JsonProperty('discount_minor')]
    public ?int $discountMinor;

    /**
     * @var ?string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $invoiceDate Invoice date (ISO 8601 format)
     */
    #[JsonProperty('invoice_date')]
    public ?string $invoiceDate;

    /**
     * @var ?string $dueDate Due date (ISO 8601 format)
     */
    #[JsonProperty('due_date')]
    public ?string $dueDate;

    /**
     * @var ?string $status Invoice status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<InvoicesExternalBatchRequestInvoicesItemLineItemsItem> $lineItems Invoice line items
     */
    #[JsonProperty('line_items'), ArrayType([InvoicesExternalBatchRequestInvoicesItemLineItemsItem::class])]
    public ?array $lineItems;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?SubscriptionTerms $subscriptionTerms
     */
    #[JsonProperty('subscription_terms')]
    public ?SubscriptionTerms $subscriptionTerms;

    /**
     * @var ?string $externalType Type within external system
     */
    #[JsonProperty('external_type')]
    public ?string $externalType;

    /**
     * @var ?DateTime $externalUpdatedAt External system's last update timestamp for stale update protection
     */
    #[JsonProperty('external_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @param array{
     *   externalId: string,
     *   customerExternalRef?: ?InvoicesExternalBatchRequestInvoicesItemCustomerExternalRef,
     *   customerUuid?: ?string,
     *   invoiceNumber?: ?string,
     *   totalMinor?: ?int,
     *   subtotalMinor?: ?int,
     *   taxMinor?: ?int,
     *   discountMinor?: ?int,
     *   currency?: ?string,
     *   invoiceDate?: ?string,
     *   dueDate?: ?string,
     *   status?: ?string,
     *   lineItems?: ?array<InvoicesExternalBatchRequestInvoicesItemLineItemsItem>,
     *   notes?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   subscriptionTerms?: ?SubscriptionTerms,
     *   externalType?: ?string,
     *   externalUpdatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->customerExternalRef = $values['customerExternalRef'] ?? null;
        $this->customerUuid = $values['customerUuid'] ?? null;
        $this->invoiceNumber = $values['invoiceNumber'] ?? null;
        $this->totalMinor = $values['totalMinor'] ?? null;
        $this->subtotalMinor = $values['subtotalMinor'] ?? null;
        $this->taxMinor = $values['taxMinor'] ?? null;
        $this->discountMinor = $values['discountMinor'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->invoiceDate = $values['invoiceDate'] ?? null;
        $this->dueDate = $values['dueDate'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->lineItems = $values['lineItems'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->subscriptionTerms = $values['subscriptionTerms'] ?? null;
        $this->externalType = $values['externalType'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
