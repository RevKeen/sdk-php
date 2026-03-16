<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreditNote extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $creditNoteNumber
     */
    #[JsonProperty('credit_note_number')]
    public ?string $creditNoteNumber;

    /**
     * @var string $invoiceId
     */
    #[JsonProperty('invoice_id')]
    public string $invoiceId;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public int $amountMinor;

    /**
     * @var ?int $taxAmountMinor
     */
    #[JsonProperty('tax_amount_minor')]
    public ?int $taxAmountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $reasonCode
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var ?string $creditMethod
     */
    #[JsonProperty('credit_method')]
    public ?string $creditMethod;

    /**
     * @var ?string $pdfUrl
     */
    #[JsonProperty('pdf_url')]
    public ?string $pdfUrl;

    /**
     * @var ?string $issuedAt
     */
    #[JsonProperty('issued_at')]
    public ?string $issuedAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
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
