<?php

namespace RevKeen\Invoices\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class InvoicesExternalBatchResponse extends JsonSerializableType
{
    /**
     * @var int $created Number of invoices created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var int $updated Number of invoices updated
     */
    #[JsonProperty('updated')]
    public int $updated;

    /**
     * @var int $skipped Number of invoices skipped due to stale data
     */
    #[JsonProperty('skipped')]
    public int $skipped;

    /**
     * @var int $blocked Number of invoices blocked due to immutable field violations
     */
    #[JsonProperty('blocked')]
    public int $blocked;

    /**
     * @var array<InvoicesExternalBatchResponseFailedItem> $failed List of failed invoices with error messages
     */
    #[JsonProperty('failed'), ArrayType([InvoicesExternalBatchResponseFailedItem::class])]
    public array $failed;

    /**
     * @param array{
     *   created: int,
     *   updated: int,
     *   skipped: int,
     *   blocked: int,
     *   failed: array<InvoicesExternalBatchResponseFailedItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->created = $values['created'];
        $this->updated = $values['updated'];
        $this->skipped = $values['skipped'];
        $this->blocked = $values['blocked'];
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
