<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Result of a batch ingest operation showing how many events were accepted and any that were rejected.
 */
class BatchIngestResult extends JsonSerializableType
{
    /**
     * @var value-of<BatchIngestResultObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var BatchIngestResultSummary $summary
     */
    #[JsonProperty('summary')]
    public BatchIngestResultSummary $summary;

    /**
     * @var array<BatchIngestResultDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([BatchIngestResultDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   object: value-of<BatchIngestResultObject>,
     *   summary: BatchIngestResultSummary,
     *   data: array<BatchIngestResultDataItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->summary = $values['summary'];
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
