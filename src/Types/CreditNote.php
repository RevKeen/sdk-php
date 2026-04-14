<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A formal accounting document that reduces the amount owed on a paid or partially paid invoice, used for refunds, billing corrections, and prorated cancellations.
 */
class CreditNote extends JsonSerializableType
{
    /**
     * @var string $id Unique credit note identifier
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $creditNoteNumber Sequential credit note number for accounting reference
     */
    #[JsonProperty('credit_note_number')]
    public ?string $creditNoteNumber;

    /**
     * @var string $invoiceId ID of the invoice this credit note applies to
     */
    #[JsonProperty('invoice_id')]
    public string $invoiceId;

    /**
     * @var ?string $customerId ID of the customer who received the credit
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

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
     * @var string $currency Three-letter ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $status Credit note status: draft, issued, or void
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $reason Human-readable reason for the credit
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $reasonCode Machine-readable reason code (e.g., billing_error, customer_request)
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var ?string $creditMethod How the credit is applied: refund_to_payment_method, customer_balance, or external
     */
    #[JsonProperty('credit_method')]
    public ?string $creditMethod;

    /**
     * @var ?string $pdfUrl URL to the credit note PDF document
     */
    #[JsonProperty('pdf_url')]
    public ?string $pdfUrl;

    /**
     * @var ?string $issuedAt When the credit note was issued (ISO 8601)
     */
    #[JsonProperty('issued_at')]
    public ?string $issuedAt;

    /**
     * @var string $createdAt When the credit note was created (ISO 8601)
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt When the credit note was last updated (ISO 8601)
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   invoiceId: string,
     *   amountMinor: int,
     *   currency: string,
     *   status: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   creditNoteNumber?: ?string,
     *   customerId?: ?string,
     *   taxAmountMinor?: ?int,
     *   reason?: ?string,
     *   reasonCode?: ?string,
     *   creditMethod?: ?string,
     *   pdfUrl?: ?string,
     *   issuedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->creditNoteNumber = $values['creditNoteNumber'] ?? null;
        $this->invoiceId = $values['invoiceId'];
        $this->customerId = $values['customerId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->taxAmountMinor = $values['taxAmountMinor'] ?? null;
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->reason = $values['reason'] ?? null;
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->creditMethod = $values['creditMethod'] ?? null;
        $this->pdfUrl = $values['pdfUrl'] ?? null;
        $this->issuedAt = $values['issuedAt'] ?? null;
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
