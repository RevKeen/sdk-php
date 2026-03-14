<?php

namespace RevKeen\Refunds\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Refunds\Types\CreateRefundInputReason;

class CreateRefundInput extends JsonSerializableType
{
    /**
     * @var string $paymentId The ID of the payment to refund
     */
    #[JsonProperty('payment_id')]
    public string $paymentId;

    /**
     * @var ?float $amountMinor Amount to refund in cents. If not provided, refunds the full remaining amount.
     */
    #[JsonProperty('amount_minor')]
    public ?float $amountMinor;

    /**
     * @var ?value-of<CreateRefundInputReason> $reason Reason for the refund
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $reasonDetails Additional details about the refund reason
     */
    #[JsonProperty('reason_details')]
    public ?string $reasonDetails;

    /**
     * @param array{
     *   paymentId: string,
     *   amountMinor?: ?float,
     *   reason?: ?value-of<CreateRefundInputReason>,
     *   reasonDetails?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->reasonDetails = $values['reasonDetails'] ?? null;
    }
}
