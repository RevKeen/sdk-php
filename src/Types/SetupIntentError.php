<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Last error encountered during setup
 */
class SetupIntentError extends JsonSerializableType
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
     * @var ?string $declineCode Decline code from the payment gateway
     */
    #[JsonProperty('decline_code')]
    public ?string $declineCode;

    /**
     * @var ?SetupIntentErrorPaymentMethod $paymentMethod The payment method that caused the error
     */
    #[JsonProperty('payment_method')]
    public ?SetupIntentErrorPaymentMethod $paymentMethod;

    /**
     * @param array{
     *   code: string,
     *   message: string,
     *   declineCode?: ?string,
     *   paymentMethod?: ?SetupIntentErrorPaymentMethod,
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
