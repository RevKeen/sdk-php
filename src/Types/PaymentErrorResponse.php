<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentErrorResponse extends JsonSerializableType
{
    /**
     * @var PaymentErrorResponseError $error
     */
    #[JsonProperty('error')]
    public PaymentErrorResponseError $error;

    /**
     * @param array{
     *   error: PaymentErrorResponseError,
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
