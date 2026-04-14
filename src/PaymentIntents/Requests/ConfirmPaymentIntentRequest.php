<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ConfirmPaymentIntentRequest extends JsonSerializableType
{
    /**
     * @var ?string $paymentMethod Payment method ID. Required if not already set on the intent.
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var ?string $returnUrl URL to redirect to after 3DS authentication
     */
    #[JsonProperty('return_url')]
    public ?string $returnUrl;

    /**
     * @param array{
     *   paymentMethod?: ?string,
     *   returnUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->returnUrl = $values['returnUrl'] ?? null;
    }
}
