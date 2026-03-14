<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomersExternalBatchResponse extends JsonSerializableType
{
    /**
     * @var int $created Number of customers created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var int $updated Number of customers updated
     */
    #[JsonProperty('updated')]
    public int $updated;

    /**
     * @var int $skipped Number of customers skipped due to stale data
     */
    #[JsonProperty('skipped')]
    public int $skipped;

    /**
     * @var array<CustomersExternalBatchResponseFailedItem> $failed List of failed customers with error messages
     */
    #[JsonProperty('failed'), ArrayType([CustomersExternalBatchResponseFailedItem::class])]
    public array $failed;

    /**
     * @param array{
     *   created: int,
     *   updated: int,
     *   skipped: int,
     *   failed: array<CustomersExternalBatchResponseFailedItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->created = $values['created'];
        $this->updated = $values['updated'];
        $this->skipped = $values['skipped'];
        $this->failed = $values['failed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
