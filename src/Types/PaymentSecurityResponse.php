<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentSecurityResponse extends JsonSerializableType
{
    /**
     * @var PaymentSecurityResult $data
     */
    #[JsonProperty('data')]
    public PaymentSecurityResult $data;

    /**
     * @param array{
     *   data: PaymentSecurityResult,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
