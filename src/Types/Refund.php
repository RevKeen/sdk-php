<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class Refund extends JsonSerializableType
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
     * @var string $paymentId The original payment ID this refund is for (alias for parent_transaction_id)
     */
    #[JsonProperty('payment_id')]
    public string $paymentId;

    /**
     * @var string $parentTransactionId Parent transaction ID in unified transaction model. Same as payment_id for refunds.
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
     * @var ?string $gatewayRefundId
     */
    #[JsonProperty('gateway_refund_id')]
    public ?string $gatewayRefundId;

    /**
     * @var float $amountMinor Refund amount in cents
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?value-of<RefundReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $reasonDetails
     */
    #[JsonProperty('reason_details')]
    public ?string $reasonDetails;

    /**
     * @var value-of<RefundStatus> $status
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
     * @var ?string $processedAt
     */
    #[JsonProperty('processed_at')]
    public ?string $processedAt;

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
     *   status: value-of<RefundStatus>,
     *   createdAt: string,
     *   orderId?: ?string,
     *   gatewayRefundId?: ?string,
     *   reason?: ?value-of<RefundReason>,
     *   reasonDetails?: ?string,
     *   failureReason?: ?string,
     *   failureCode?: ?string,
     *   processedAt?: ?string,
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
        $this->gatewayRefundId = $values['gatewayRefundId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reason = $values['reason'] ?? null;
        $this->reasonDetails = $values['reasonDetails'] ?? null;
        $this->status = $values['status'];
        $this->failureReason = $values['failureReason'] ?? null;
        $this->failureCode = $values['failureCode'] ?? null;
        $this->processedAt = $values['processedAt'] ?? null;
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
