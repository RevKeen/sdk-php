<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Types\CustomerPayment;
use RevKeen\Core\Types\ArrayType;

class CustomersPaymentsListResponse extends JsonSerializableType
{
    /**
     * @var value-of<CustomersPaymentsListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<CustomerPayment> $data
     */
    #[JsonProperty('data'), ArrayType([CustomerPayment::class])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   object: value-of<CustomersPaymentsListResponseObject>,
     *   data: array<CustomerPayment>,
     *   hasMore: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
