<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Types\SubscriptionTerms;

class InvoicesCreateRequest extends JsonSerializableType
{
    /**
     * @var string $customerUuid
     */
    #[JsonProperty('customer_uuid')]
    public string $customerUuid;

    /**
     * @var ?string $invoiceNumber
     */
    #[JsonProperty('invoice_number')]
    public ?string $invoiceNumber;

    /**
     * @var int $totalMinor
     */
    #[JsonProperty('total_minor')]
    public int $totalMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

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
     * @param array{
     *   customerUuid: string,
     *   totalMinor: int,
     *   invoiceNumber?: ?string,
     *   currency?: ?string,
     *   dueDate?: ?string,
     *   status?: ?string,
     *   customFields?: ?array<string, mixed>,
     *   subscriptionTerms?: ?SubscriptionTerms,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerUuid = $values['customerUuid'];
        $this->invoiceNumber = $values['invoiceNumber'] ?? null;
        $this->totalMinor = $values['totalMinor'];
        $this->currency = $values['currency'] ?? null;
        $this->dueDate = $values['dueDate'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->subscriptionTerms = $values['subscriptionTerms'] ?? null;
    }
}
