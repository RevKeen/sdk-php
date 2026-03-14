<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class BatchIngestResultDataItem extends JsonSerializableType
{
    /**
     * @var float $index
     */
    #[JsonProperty('index')]
    public float $index;

    /**
     * @var value-of<BatchIngestResultDataItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   index: float,
     *   status: value-of<BatchIngestResultDataItemStatus>,
     *   id?: ?string,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->index = $values['index'];
        $this->status = $values['status'];
        $this->id = $values['id'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
