<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A list of payment methods attached to a customer.
 */
class CustomerPaymentMethodsListResponse extends JsonSerializableType
{
    /**
     * @var array<PaymentMethod> $data
     */
    #[JsonProperty('data'), ArrayType([PaymentMethod::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<PaymentMethod>,
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
