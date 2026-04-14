<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A void cancels an unsettled payment before gateway settlement. Voids are always for the full amount — use a refund for settled payments.
 */
class Void extends JsonSerializableType
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
     * @var string $paymentId The original payment ID this void is for (alias for parent_transaction_id)
     */
    #[JsonProperty('payment_id')]
    public string $paymentId;

    /**
     * @var string $parentTransactionId Parent transaction ID in unified transaction model.
     */
    #[JsonProperty('parent_transaction_id')]
    public string $parentTransactionId;

    /**
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    public ?string $orderId;

    /**
     * @var string $gateway
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var ?string $gatewayVoidId
     */
    #[JsonProperty('gateway_void_id')]
    public ?string $gatewayVoidId;

    /**
     * @var float $amountMinor Void amount in cents (always full amount of original transaction)
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
     * @var ?value-of<VoidReasonCode> $reasonCode
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @var value-of<VoidStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $failureReason
     */
    #[JsonProperty('failure_reason')]
    public ?string $failureReason;

    /**
     * @var ?string $failureCode
     */
    #[JsonProperty('failure_code')]
    public ?string $failureCode;

    /**
     * @var ?string $voidedAt
     */
    #[JsonProperty('voided_at')]
    public ?string $voidedAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   paymentId: string,
     *   parentTransactionId: string,
     *   gateway: string,
     *   amountMinor: float,
     *   currency: string,
     *   status: value-of<VoidStatus>,
     *   createdAt: string,
     *   orderId?: ?string,
     *   gatewayVoidId?: ?string,
     *   reason?: ?string,
     *   reasonCode?: ?value-of<VoidReasonCode>,
     *   failureReason?: ?string,
     *   failureCode?: ?string,
     *   voidedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'];
        $this->paymentId = $values['paymentId'];
        $this->parentTransactionId = $values['parentTransactionId'];
        $this->orderId = $values['orderId'] ?? null;
        $this->gateway = $values['gateway'];
        $this->gatewayVoidId = $values['gatewayVoidId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reason = $values['reason'] ?? null;
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->status = $values['status'];
        $this->failureReason = $values['failureReason'] ?? null;
        $this->failureCode = $values['failureCode'] ?? null;
        $this->voidedAt = $values['voidedAt'] ?? null;
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
