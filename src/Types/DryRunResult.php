<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class DryRunResult extends JsonSerializableType
{
    /**
     * @var value-of<DryRunResultObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var DryRunResultSummary $summary
     */
    #[JsonProperty('summary')]
    public DryRunResultSummary $summary;

    /**
     * @var array<DryRunResultDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([DryRunResultDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   object: value-of<DryRunResultObject>,
     *   summary: DryRunResultSummary,
     *   data: array<DryRunResultDataItem>,
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
