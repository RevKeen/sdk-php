<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Invoices\Types\InvoicesCreditNoteIssueRequestReasonCode;
use RevKeen\Invoices\Types\InvoicesCreditNoteIssueRequestCreditMethod;
use RevKeen\Core\Types\ArrayType;

class InvoicesCreditNoteIssueRequest extends JsonSerializableType
{
    /**
     * @var int $amountMinor Credit amount in minor units (cents)
     */
    #[JsonProperty('amount_minor')]
    public int $amountMinor;

    /**
     * @var ?int $taxAmountMinor Tax portion of the credit in minor units
     */
    #[JsonProperty('tax_amount_minor')]
    public ?int $taxAmountMinor;

    /**
     * @var string $reason Reason for issuing the credit note
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var ?value-of<InvoicesCreditNoteIssueRequestReasonCode> $reasonCode Categorized reason code for the credit note
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var ?value-of<InvoicesCreditNoteIssueRequestCreditMethod> $creditMethod How to apply the credit: refund to original payment method, add to customer balance, or mark as external
     */
    #[JsonProperty('credit_method')]
    public ?string $creditMethod;

    /**
     * @var ?bool $cancelSubscription If true, cancels the associated subscription (if any)
     */
    #[JsonProperty('cancel_subscription')]
    public ?bool $cancelSubscription;

    /**
     * @var ?bool $isProrated Whether this is a prorated credit for unused service time
     */
    #[JsonProperty('is_prorated')]
    public ?bool $isProrated;

    /**
     * @var ?int $prorationDaysTotal Total days in billing period (for prorated credits)
     */
    #[JsonProperty('proration_days_total')]
    public ?int $prorationDaysTotal;

    /**
     * @var ?int $prorationDaysUnused Unused days being credited (for prorated credits)
     */
    #[JsonProperty('proration_days_unused')]
    public ?int $prorationDaysUnused;

    /**
     * @var ?string $idempotencyKey Unique key to prevent duplicate credit notes
     */
    #[JsonProperty('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   amountMinor: int,
     *   reason: string,
     *   taxAmountMinor?: ?int,
     *   reasonCode?: ?value-of<InvoicesCreditNoteIssueRequestReasonCode>,
     *   creditMethod?: ?value-of<InvoicesCreditNoteIssueRequestCreditMethod>,
     *   cancelSubscription?: ?bool,
     *   isProrated?: ?bool,
     *   prorationDaysTotal?: ?int,
     *   prorationDaysUnused?: ?int,
     *   idempotencyKey?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMinor = $values['amountMinor'];
        $this->taxAmountMinor = $values['taxAmountMinor'] ?? null;
        $this->reason = $values['reason'];
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->creditMethod = $values['creditMethod'] ?? null;
        $this->cancelSubscription = $values['cancelSubscription'] ?? null;
        $this->isProrated = $values['isProrated'] ?? null;
        $this->prorationDaysTotal = $values['prorationDaysTotal'] ?? null;
        $this->prorationDaysUnused = $values['prorationDaysUnused'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
