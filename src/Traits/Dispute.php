<?php

namespace RevKeen\Traits;

use RevKeen\Types\DisputeStatus;
use RevKeen\Types\DisputeResolution;
use RevKeen\Core\Json\JsonProperty;

/**
 * @property string $id
 * @property string $publicId
 * @property ?string $paymentId
 * @property ?string $parentTransactionId
 * @property string $gateway
 * @property string $gatewayDisputeId
 * @property ?string $gatewayTransactionId
 * @property float $amountMinor
 * @property string $currency
 * @property ?string $reasonCode
 * @property ?string $reason
 * @property ?string $networkReasonCode
 * @property ?string $networkReasonDescription
 * @property ?string $customerName
 * @property ?string $cardBrand
 * @property ?string $cardLast4
 * @property ?string $evidenceDueBy
 * @property bool $evidenceSubmitted
 * @property ?string $evidenceSubmittedAt
 * @property value-of<DisputeStatus> $status
 * @property ?value-of<DisputeResolution> $resolution
 * @property ?string $resolvedAt
 * @property string $disputedAt
 * @property string $createdAt
 */
trait Dispute
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
}
