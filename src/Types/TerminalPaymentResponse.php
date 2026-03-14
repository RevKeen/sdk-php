<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TerminalPaymentResponse extends JsonSerializableType
{
    /**
     * @var TerminalPayment $data
     */
    #[JsonProperty('data')]
    public TerminalPayment $data;

    /**
     * @param array{
     *   data: TerminalPayment,
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
