<?php

namespace RevKeen\Payments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CapturePaymentRequest extends JsonSerializableType
{
    /**
     * @var ?int $amount Amount to capture in cents. Defaults to full authorized amount. Must be <= authorized amount.
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @param array{
     *   amount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amount = $values['amount'] ?? null;
    }
}
