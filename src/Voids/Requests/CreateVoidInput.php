<?php

namespace RevKeen\Voids\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Voids\Types\CreateVoidInputReasonCode;

class CreateVoidInput extends JsonSerializableType
{
    /**
     * @var string $paymentId The ID of the payment to void. Must be unsettled.
     */
    #[JsonProperty('payment_id')]
    public string $paymentId;

    /**
     * @var ?string $reason Reason for the void
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<CreateVoidInputReasonCode> $reasonCode Standardized reason code for the void
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @param array{
     *   paymentId: string,
     *   reason?: ?string,
     *   reasonCode?: ?value-of<CreateVoidInputReasonCode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
        $this->reason = $values['reason'] ?? null;
        $this->reasonCode = $values['reasonCode'] ?? null;
    }
}
