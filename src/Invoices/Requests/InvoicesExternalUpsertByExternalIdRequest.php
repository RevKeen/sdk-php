<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Invoices\Types\InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Invoices\Types\InvoicesExternalUpsertByExternalIdRequestLineItemsItem;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Types\SubscriptionTerms;
use DateTime;
use RevKeen\Core\Types\Date;

class InvoicesExternalUpsertByExternalIdRequest extends JsonSerializableType
{
    /**
     * @var ?InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef $customerExternalRef
     */
    #[JsonProperty('customer_external_ref')]
    public ?InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef $customerExternalRef;

    /**
     * @var ?string $customerUuid
     */
    #[JsonProperty('customer_uuid')]
    public ?string $customerUuid;

    /**
     * @var ?string $invoiceNumber
     */
    #[JsonProperty('invoice_number')]
    public ?string $invoiceNumber;

    /**
     * @var ?int $totalMinor
     */
    #[JsonProperty('total_minor')]
    public ?int $totalMinor;

    /**
     * @var ?int $subtotalMinor
     */
    #[JsonProperty('subtotal_minor')]
    public ?int $subtotalMinor;

    /**
     * @var ?int $taxMinor
     */
    #[JsonProperty('tax_minor')]
    public ?int $taxMinor;

    /**
     * @var ?int $discountMinor
     */
    #[JsonProperty('discount_minor')]
    public ?int $discountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $invoiceDate
     */
    #[JsonProperty('invoice_date')]
    public ?string $invoiceDate;

    /**
     * @var ?string $dueDate
     */
    #[JsonProperty('due_date')]
    public ?string $dueDate;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<InvoicesExternalUpsertByExternalIdRequestLineItemsItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([InvoicesExternalUpsertByExternalIdRequestLineItemsItem::class])]
    public ?array $lineItems;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $customFields Key-value pairs for custom fields
     */
    #[JsonProperty('custom_fields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @var ?SubscriptionTerms $subscriptionTerms
     */
    #[JsonProperty('subscription_terms')]
    public ?SubscriptionTerms $subscriptionTerms;

    /**
     * @var ?DateTime $externalUpdatedAt
     */
    #[JsonProperty('external_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @var ?string $externalType
     */
    #[JsonProperty('external_type')]
    public ?string $externalType;

    /**
     * @param array{
     *   customerExternalRef?: ?InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef,
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
     *   lineItems?: ?array<InvoicesExternalUpsertByExternalIdRequestLineItemsItem>,
     *   notes?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   customFields?: ?array<string, mixed>,
     *   subscriptionTerms?: ?SubscriptionTerms,
     *   externalUpdatedAt?: ?DateTime,
     *   externalType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
        $this->customFields = $values['customFields'] ?? null;
        $this->subscriptionTerms = $values['subscriptionTerms'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
        $this->externalType = $values['externalType'] ?? null;
    }
}
