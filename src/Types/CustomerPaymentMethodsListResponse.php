<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomerPaymentMethodsListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data Payment method objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
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
