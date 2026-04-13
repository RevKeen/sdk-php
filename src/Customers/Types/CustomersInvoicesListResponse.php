<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Types\CustomerInvoice;
use RevKeen\Core\Types\ArrayType;

class CustomersInvoicesListResponse extends JsonSerializableType
{
    /**
     * @var value-of<CustomersInvoicesListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<CustomerInvoice> $data
     */
    #[JsonProperty('data'), ArrayType([CustomerInvoice::class])]
    public array $data;

    /**
     * @var bool $hasMore Whether more results exist beyond this page
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   object: value-of<CustomersInvoicesListResponseObject>,
     *   data: array<CustomerInvoice>,
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
