<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Eligibility details showing whether a credit note can be issued for the specified invoice and the maximum creditable amount.
 */
class CreditNoteEligibilityResponse extends JsonSerializableType
{
    /**
     * @var string $invoiceId
     */
    #[JsonProperty('invoice_id')]
    public string $invoiceId;

    /**
     * @var float $totalAmountMinor
     */
    #[JsonProperty('total_amount_minor')]
    public float $totalAmountMinor;

    /**
     * @var float $totalPaidMinor
     */
    #[JsonProperty('total_paid_minor')]
    public float $totalPaidMinor;

    /**
     * @var float $totalCreditedMinor
     */
    #[JsonProperty('total_credited_minor')]
    public float $totalCreditedMinor;

    /**
     * @var float $maxCreditableMinor
     */
    #[JsonProperty('max_creditable_minor')]
    public float $maxCreditableMinor;

    /**
     * @var bool $eligible
     */
    #[JsonProperty('eligible')]
    public bool $eligible;

    /**
     * @var array<CreditNoteEligibilityResponsePaymentsItem> $payments
     */
    #[JsonProperty('payments'), ArrayType([CreditNoteEligibilityResponsePaymentsItem::class])]
    public array $payments;

    /**
     * @param array{
     *   invoiceId: string,
     *   totalAmountMinor: float,
     *   totalPaidMinor: float,
     *   totalCreditedMinor: float,
     *   maxCreditableMinor: float,
     *   eligible: bool,
     *   payments: array<CreditNoteEligibilityResponsePaymentsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->totalAmountMinor = $values['totalAmountMinor'];
        $this->totalPaidMinor = $values['totalPaidMinor'];
        $this->totalCreditedMinor = $values['totalCreditedMinor'];
        $this->maxCreditableMinor = $values['maxCreditableMinor'];
        $this->eligible = $values['eligible'];
        $this->payments = $values['payments'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
