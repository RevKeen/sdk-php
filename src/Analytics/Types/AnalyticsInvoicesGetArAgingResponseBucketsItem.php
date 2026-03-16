<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsInvoicesGetArAgingResponseBucketsItem extends JsonSerializableType
{
    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @var float $totalMinor
     */
    #[JsonProperty('totalMinor')]
    public float $totalMinor;

    /**
     * @param array{
     *   label: string,
     *   count: float,
     *   totalMinor: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->label = $values['label'];
        $this->count = $values['count'];
        $this->totalMinor = $values['totalMinor'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
