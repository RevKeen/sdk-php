<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of transactions matching the query filters.
 */
class TransactionListResponse extends JsonSerializableType
{
    /**
     * @var value-of<TransactionListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<Transaction> $data
     */
    #[JsonProperty('data'), ArrayType([Transaction::class])]
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
     *   object: value-of<TransactionListResponseObject>,
     *   data: array<Transaction>,
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
