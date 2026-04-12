<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Error response returned when a payment intent operation fails.
 */
class PaymentIntentErrorResponse extends JsonSerializableType
{
    /**
     * @var PaymentIntentErrorResponseError $error
     */
    #[JsonProperty('error')]
    public PaymentIntentErrorResponseError $error;

    /**
     * @param array{
     *   error: PaymentIntentErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
