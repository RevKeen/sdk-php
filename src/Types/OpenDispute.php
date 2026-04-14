<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * An open dispute requiring action, with urgency indicators for evidence submission deadlines.
 */
class OpenDispute extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the dispute
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $publicId Public-facing dispute identifier
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var ?string $paymentId The original payment ID this dispute is for
     */
    #[JsonProperty('payment_id')]
    public ?string $paymentId;

    /**
     * @var ?string $parentTransactionId Parent transaction ID in unified transaction model
     */
    #[JsonProperty('parent_transaction_id')]
    public ?string $parentTransactionId;

    /**
     * @var string $gateway Payment gateway that processed the original transaction
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var float $amountMinor Disputed amount in cents
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency Three-letter ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $reason Human-readable reason for the dispute
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $customerName Name of the customer who filed the dispute
     */
    #[JsonProperty('customer_name')]
    public ?string $customerName;

    /**
     * @var ?string $cardBrand Card brand used for the original payment
     */
    #[JsonProperty('card_brand')]
    public ?string $cardBrand;

    /**
     * @var ?string $cardLast4 Last four digits of the card used for the original payment
     */
    #[JsonProperty('card_last4')]
    public ?string $cardLast4;

    /**
     * @var ?string $evidenceDueBy Deadline for submitting evidence to contest the dispute
     */
    #[JsonProperty('evidence_due_by')]
    public ?string $evidenceDueBy;

    /**
     * @var ?float $daysUntilDue Number of days remaining until the evidence deadline
     */
    #[JsonProperty('days_until_due')]
    public ?float $daysUntilDue;

    /**
     * @var bool $isOverdue Whether the evidence submission deadline has passed
     */
    #[JsonProperty('is_overdue')]
    public bool $isOverdue;

    /**
     * @var string $disputedAt Timestamp when the dispute was filed
     */
    #[JsonProperty('disputed_at')]
    public string $disputedAt;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   gateway: string,
     *   amountMinor: float,
     *   currency: string,
     *   isOverdue: bool,
     *   disputedAt: string,
     *   paymentId?: ?string,
     *   parentTransactionId?: ?string,
     *   reason?: ?string,
     *   customerName?: ?string,
     *   cardBrand?: ?string,
     *   cardLast4?: ?string,
     *   evidenceDueBy?: ?string,
     *   daysUntilDue?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'];
        $this->paymentId = $values['paymentId'] ?? null;
        $this->parentTransactionId = $values['parentTransactionId'] ?? null;
        $this->gateway = $values['gateway'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reason = $values['reason'] ?? null;
        $this->customerName = $values['customerName'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLast4 = $values['cardLast4'] ?? null;
        $this->evidenceDueBy = $values['evidenceDueBy'] ?? null;
        $this->daysUntilDue = $values['daysUntilDue'] ?? null;
        $this->isOverdue = $values['isOverdue'];
        $this->disputedAt = $values['disputedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
