<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class OpenDispute extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $publicId
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var ?string $paymentId
     */
    #[JsonProperty('payment_id')]
    public ?string $paymentId;

    /**
     * @var ?string $parentTransactionId
     */
    #[JsonProperty('parent_transaction_id')]
    public ?string $parentTransactionId;

    /**
     * @var string $gateway
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var float $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $customerName
     */
    #[JsonProperty('customer_name')]
    public ?string $customerName;

    /**
     * @var ?string $cardBrand
     */
    #[JsonProperty('card_brand')]
    public ?string $cardBrand;

    /**
     * @var ?string $cardLast4
     */
    #[JsonProperty('card_last4')]
    public ?string $cardLast4;

    /**
     * @var ?string $evidenceDueBy
     */
    #[JsonProperty('evidence_due_by')]
    public ?string $evidenceDueBy;

    /**
     * @var ?float $daysUntilDue
     */
    #[JsonProperty('days_until_due')]
    public ?float $daysUntilDue;

    /**
     * @var bool $isOverdue
     */
    #[JsonProperty('is_overdue')]
    public bool $isOverdue;

    /**
     * @var string $disputedAt
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
