<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Payment method that caused the error
 */
class PaymentIntentLastPaymentErrorPaymentMethod extends JsonSerializableType
{
    /**
     * @var string $id Payment method ID
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $type Payment method type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   id: string,
     *   type: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
