<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * The canonical record of what a customer owes or has paid. Invoices track line items, amounts, and payment status through their lifecycle: draft → open → finalized → paid.
 */
class Invoice extends JsonSerializableType
{
    /**
     * @var string $id Unique invoice identifier
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerUuid ID of the customer this invoice belongs to
     */
    #[JsonProperty('customer_uuid')]
    public string $customerUuid;

    /**
     * @var ?string $invoiceNumber Merchant-assigned invoice number for reference
     */
    #[JsonProperty('invoice_number')]
    public ?string $invoiceNumber;

    /**
     * @var int $totalMinor Total amount in minor units (cents)
     */
    #[JsonProperty('total_minor')]
    public int $totalMinor;

    /**
     * @var string $currency Three-letter ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?array<string> $allowedMethods Allowed payment methods for checkout sessions against this invoice
     */
    #[JsonProperty('allowed_methods'), ArrayType(['string'])]
    public ?array $allowedMethods;

    /**
     * @var string $status Invoice lifecycle status: draft, open, finalized, paid, void, or uncollectible
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $dueDate Payment due date in ISO 8601 format
     */
    #[JsonProperty('due_date')]
    public ?string $dueDate;

    /**
     * @var ?array<string, mixed> $customFields Key-value pairs for custom fields
     */
    #[JsonProperty('custom_fields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @var ?string $externalSource External integration source (e.g., practicehub, wodify)
     */
    #[JsonProperty('external_source')]
    public ?string $externalSource;

    /**
     * @var ?string $externalType Type within external system (e.g., appointment, membership)
     */
    #[JsonProperty('external_type')]
    public ?string $externalType;

    /**
     * @var ?string $externalId ID from external system
     */
    #[JsonProperty('external_id')]
    public ?string $externalId;

    /**
     * @var ?InvoiceSubscriptionTerms $subscriptionTerms Subscription billing terms for recurring invoices
     */
    #[JsonProperty('subscription_terms')]
    public ?InvoiceSubscriptionTerms $subscriptionTerms;

    /**
     * @var string $createdAt When the invoice was created (ISO 8601)
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt When the invoice was last updated (ISO 8601)
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   customerUuid: string,
     *   totalMinor: int,
     *   currency: string,
     *   status: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   invoiceNumber?: ?string,
     *   allowedMethods?: ?array<string>,
     *   dueDate?: ?string,
     *   customFields?: ?array<string, mixed>,
     *   externalSource?: ?string,
     *   externalType?: ?string,
     *   externalId?: ?string,
     *   subscriptionTerms?: ?InvoiceSubscriptionTerms,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerUuid = $values['customerUuid'];
        $this->invoiceNumber = $values['invoiceNumber'] ?? null;
        $this->totalMinor = $values['totalMinor'];
        $this->currency = $values['currency'];
        $this->allowedMethods = $values['allowedMethods'] ?? null;
        $this->status = $values['status'];
        $this->dueDate = $values['dueDate'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->externalSource = $values['externalSource'] ?? null;
        $this->externalType = $values['externalType'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->subscriptionTerms = $values['subscriptionTerms'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
