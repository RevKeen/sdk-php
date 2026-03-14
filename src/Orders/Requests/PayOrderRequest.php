<?php

namespace RevKeen\Orders\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PayOrderRequest extends JsonSerializableType
{
    /**
     * @var ?string $paymentMethodId Saved payment method ID
     */
    #[JsonProperty('payment_method_id')]
    public ?string $paymentMethodId;

    /**
     * @var ?string $paymentToken One-time payment token
     */
    #[JsonProperty('payment_token')]
    public ?string $paymentToken;

    /**
     * @var ?int $amount Partial payment amount in cents (defaults to full amount_due)
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @param array{
     *   paymentMethodId?: ?string,
     *   paymentToken?: ?string,
     *   amount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->paymentToken = $values['paymentToken'] ?? null;
        $this->amount = $values['amount'] ?? null;
    }
}
