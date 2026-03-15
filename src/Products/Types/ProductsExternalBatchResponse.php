<?php

namespace RevKeen\Products\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ProductsExternalBatchResponse extends JsonSerializableType
{
    /**
     * @var int $created Number of products created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var int $updated Number of products updated
     */
    #[JsonProperty('updated')]
    public int $updated;

    /**
     * @var int $skipped Number of products skipped due to stale data
     */
    #[JsonProperty('skipped')]
    public int $skipped;

    /**
     * @var array<ProductsExternalBatchResponseFailedItem> $failed List of failed products with error messages
     */
    #[JsonProperty('failed'), ArrayType([ProductsExternalBatchResponseFailedItem::class])]
    public array $failed;

    /**
     * @param array{
     *   created: int,
     *   updated: int,
     *   skipped: int,
     *   failed: array<ProductsExternalBatchResponseFailedItem>,
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
