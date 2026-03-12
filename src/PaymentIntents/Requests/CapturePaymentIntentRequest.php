<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CapturePaymentIntentRequest extends JsonSerializableType
{
    /**
     * @var ?int $amountToCapture Amount to capture in cents. Defaults to full authorized amount.
     */
    #[JsonProperty('amount_to_capture')]
    public ?int $amountToCapture;

    /**
     * @param array{
     *   amountToCapture?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountToCapture = $values['amountToCapture'] ?? null;
    }
}
