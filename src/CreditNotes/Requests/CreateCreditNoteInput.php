<?php

namespace RevKeen\CreditNotes\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\CreditNotes\Types\CreateCreditNoteInputCreditMethod;
use RevKeen\CreditNotes\Types\CreateCreditNoteInputReasonCode;
use RevKeen\Core\Types\ArrayType;

class CreateCreditNoteInput extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the invoice to issue a credit note for
     */
    #[JsonProperty('invoice_id')]
    public string $invoiceId;

    /**
     * @var float $amountMinor Amount to credit in cents
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var ?float $taxAmountMinor Tax portion of the credit in cents (for UK/EU VAT compliance)
     */
    #[JsonProperty('tax_amount_minor')]
    public ?float $taxAmountMinor;

    /**
     * @var ?value-of<CreateCreditNoteInputCreditMethod> $creditMethod How the credit should be applied
     */
    #[JsonProperty('credit_method')]
    public ?string $creditMethod;

    /**
     * @var ?string $reason Reason for the credit note
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<CreateCreditNoteInputReasonCode> $reasonCode Standardized reason code
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var ?bool $cancelSubscription Whether to cancel the associated subscription after issuing
     */
    #[JsonProperty('cancel_subscription')]
    public ?bool $cancelSubscription;

    /**
     * @var ?bool $isProrated Whether this credit note represents a prorated amount
     */
    #[JsonProperty('is_prorated')]
    public ?bool $isProrated;

    /**
     * @var ?float $prorationDaysTotal Total days in the billing period (for prorated credits)
     */
    #[JsonProperty('proration_days_total')]
    public ?float $prorationDaysTotal;

    /**
     * @var ?float $prorationDaysUnused Unused days in the billing period (for prorated credits)
     */
    #[JsonProperty('proration_days_unused')]
    public ?float $prorationDaysUnused;

    /**
     * @var ?string $idempotencyKey Idempotency key to prevent duplicate credit notes
     */
    #[JsonProperty('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?bool $autoRoute When true, automatically trigger the process-credit-note task for multi-gateway reversal routing. Response will include gateway_operations array.
     */
    #[JsonProperty('auto_route')]
    public ?bool $autoRoute;

    /**
     * @var ?bool $customerPresent For terminal (card-present) transactions: whether the customer is physically at the terminal. Defaults to false in API context.
     */
    #[JsonProperty('customer_present')]
    public ?bool $customerPresent;

    /**
     * @param array{
     *   invoiceId: string,
     *   amountMinor: float,
     *   taxAmountMinor?: ?float,
     *   creditMethod?: ?value-of<CreateCreditNoteInputCreditMethod>,
     *   reason?: ?string,
     *   reasonCode?: ?value-of<CreateCreditNoteInputReasonCode>,
     *   cancelSubscription?: ?bool,
     *   isProrated?: ?bool,
     *   prorationDaysTotal?: ?float,
     *   prorationDaysUnused?: ?float,
     *   idempotencyKey?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   autoRoute?: ?bool,
     *   customerPresent?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->amountMinor = $values['amountMinor'];
        $this->taxAmountMinor = $values['taxAmountMinor'] ?? null;
        $this->creditMethod = $values['creditMethod'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->cancelSubscription = $values['cancelSubscription'] ?? null;
        $this->isProrated = $values['isProrated'] ?? null;
        $this->prorationDaysTotal = $values['prorationDaysTotal'] ?? null;
        $this->prorationDaysUnused = $values['prorationDaysUnused'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->autoRoute = $values['autoRoute'] ?? null;
        $this->customerPresent = $values['customerPresent'] ?? null;
    }
}
