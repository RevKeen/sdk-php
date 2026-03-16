<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DryRunResultSummary extends JsonSerializableType
{
    /**
     * @var float $wouldIngest
     */
    #[JsonProperty('would_ingest')]
    public float $wouldIngest;

    /**
     * @var float $wouldSkip
     */
    #[JsonProperty('would_skip')]
    public float $wouldSkip;

    /**
     * @var float $wouldFail
     */
    #[JsonProperty('would_fail')]
    public float $wouldFail;

    /**
     * @param array{
     *   wouldIngest: float,
     *   wouldSkip: float,
     *   wouldFail: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->wouldIngest = $values['wouldIngest'];
        $this->wouldSkip = $values['wouldSkip'];
        $this->wouldFail = $values['wouldFail'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
