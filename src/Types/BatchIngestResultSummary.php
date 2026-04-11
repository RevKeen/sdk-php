<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class BatchIngestResultSummary extends JsonSerializableType
{
    /**
     * @var float $ingested
     */
    #[JsonProperty('ingested')]
    public float $ingested;

    /**
     * @var float $duplicate
     */
    #[JsonProperty('duplicate')]
    public float $duplicate;

    /**
     * @var float $skipped
     */
    #[JsonProperty('skipped')]
    public float $skipped;

    /**
     * @var float $failed
     */
    #[JsonProperty('failed')]
    public float $failed;

    /**
     * @param array{
     *   ingested: float,
     *   duplicate: float,
     *   skipped: float,
     *   failed: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ingested = $values['ingested'];
        $this->duplicate = $values['duplicate'];
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
