<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class Dispute extends JsonSerializableType
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
     * @var ?string $paymentId The original payment ID this dispute is for (alias for parent_transaction_id)
     */
    #[JsonProperty('payment_id')]
    public ?string $paymentId;

    /**
     * @var ?string $parentTransactionId Parent transaction ID in unified transaction model. Same as payment_id for disputes.
     */
    #[JsonProperty('parent_transaction_id')]
    public ?string $parentTransactionId;

    /**
     * @var string $gateway
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var string $gatewayDisputeId
     */
    #[JsonProperty('gateway_dispute_id')]
    public string $gatewayDisputeId;

    /**
     * @var ?string $gatewayTransactionId
     */
    #[JsonProperty('gateway_transaction_id')]
    public ?string $gatewayTransactionId;

    /**
     * @var float $amountMinor Disputed amount in cents
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $reasonCode Card network reason code
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $networkReasonCode
     */
    #[JsonProperty('network_reason_code')]
    public ?string $networkReasonCode;

    /**
     * @var ?string $networkReasonDescription
     */
    #[JsonProperty('network_reason_description')]
    public ?string $networkReasonDescription;

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
     * @var bool $evidenceSubmitted
     */
    #[JsonProperty('evidence_submitted')]
    public bool $evidenceSubmitted;

    /**
     * @var ?string $evidenceSubmittedAt
     */
    #[JsonProperty('evidence_submitted_at')]
    public ?string $evidenceSubmittedAt;

    /**
     * @var value-of<DisputeStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?value-of<DisputeResolution> $resolution
     */
    #[JsonProperty('resolution')]
    public ?string $resolution;

    /**
     * @var ?string $resolvedAt
     */
    #[JsonProperty('resolved_at')]
    public ?string $resolvedAt;

    /**
     * @var string $disputedAt
     */
    #[JsonProperty('disputed_at')]
    public string $disputedAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   gateway: string,
     *   gatewayDisputeId: string,
     *   amountMinor: float,
     *   currency: string,
     *   evidenceSubmitted: bool,
     *   status: value-of<DisputeStatus>,
     *   disputedAt: string,
     *   createdAt: string,
     *   paymentId?: ?string,
     *   parentTransactionId?: ?string,
     *   gatewayTransactionId?: ?string,
     *   reasonCode?: ?string,
     *   reason?: ?string,
     *   networkReasonCode?: ?string,
     *   networkReasonDescription?: ?string,
     *   customerName?: ?string,
     *   cardBrand?: ?string,
     *   cardLast4?: ?string,
     *   evidenceDueBy?: ?string,
     *   evidenceSubmittedAt?: ?string,
     *   resolution?: ?value-of<DisputeResolution>,
     *   resolvedAt?: ?string,
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
        $this->gatewayDisputeId = $values['gatewayDisputeId'];
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->networkReasonCode = $values['networkReasonCode'] ?? null;
        $this->networkReasonDescription = $values['networkReasonDescription'] ?? null;
        $this->customerName = $values['customerName'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLast4 = $values['cardLast4'] ?? null;
        $this->evidenceDueBy = $values['evidenceDueBy'] ?? null;
        $this->evidenceSubmitted = $values['evidenceSubmitted'];
        $this->evidenceSubmittedAt = $values['evidenceSubmittedAt'] ?? null;
        $this->status = $values['status'];
        $this->resolution = $values['resolution'] ?? null;
        $this->resolvedAt = $values['resolvedAt'] ?? null;
        $this->disputedAt = $values['disputedAt'];
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
