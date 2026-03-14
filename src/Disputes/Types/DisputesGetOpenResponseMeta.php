<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DisputesGetOpenResponseMeta extends JsonSerializableType
{
    /**
     * @var float $totalOpen
     */
    #[JsonProperty('total_open')]
    public float $totalOpen;

    /**
     * @var float $overdueCount
     */
    #[JsonProperty('overdue_count')]
    public float $overdueCount;

    /**
     * @param array{
     *   totalOpen: float,
     *   overdueCount: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalOpen = $values['totalOpen'];
        $this->overdueCount = $values['overdueCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
