<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Types\CustomerSubscription;
use RevKeen\Core\Types\ArrayType;

class CustomersSubscriptionsListResponse extends JsonSerializableType
{
    /**
     * @var value-of<CustomersSubscriptionsListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<CustomerSubscription> $data
     */
    #[JsonProperty('data'), ArrayType([CustomerSubscription::class])]
    public array $data;

    /**
     * @var bool $hasMore Whether more results exist beyond this page
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   object: value-of<CustomersSubscriptionsListResponseObject>,
     *   data: array<CustomerSubscription>,
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
