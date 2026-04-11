<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Last error from payment attempt
 */
class PaymentIntentLastPaymentError extends JsonSerializableType
{
    /**
     * @var string $code Error code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message Human-readable error message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $declineCode Card decline code if applicable
     */
    #[JsonProperty('decline_code')]
    public ?string $declineCode;

    /**
     * @var ?PaymentIntentLastPaymentErrorPaymentMethod $paymentMethod Payment method that caused the error
     */
    #[JsonProperty('payment_method')]
    public ?PaymentIntentLastPaymentErrorPaymentMethod $paymentMethod;

    /**
     * @param array{
     *   code: string,
     *   message: string,
     *   declineCode?: ?string,
     *   paymentMethod?: ?PaymentIntentLastPaymentErrorPaymentMethod,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->message = $values['message'];
        $this->declineCode = $values['declineCode'] ?? null;
        $this->paymentMethod = $values['paymentMethod'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
