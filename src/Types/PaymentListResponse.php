<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of payments matching the query filters.
 */
class PaymentListResponse extends JsonSerializableType
{
    /**
     * @var value-of<PaymentListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<Payment> $data
     */
    #[JsonProperty('data'), ArrayType([Payment::class])]
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
     *   object: value-of<PaymentListResponseObject>,
     *   data: array<Payment>,
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
