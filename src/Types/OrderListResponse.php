<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of orders matching the query filters.
 */
class OrderListResponse extends JsonSerializableType
{
    /**
     * @var value-of<OrderListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<Order> $data
     */
    #[JsonProperty('data'), ArrayType([Order::class])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @var ?int $totalCount
     */
    #[JsonProperty('total_count')]
    public ?int $totalCount;

    /**
     * @param array{
     *   object: value-of<OrderListResponseObject>,
     *   data: array<Order>,
     *   hasMore: bool,
     *   totalCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
        $this->totalCount = $values['totalCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
