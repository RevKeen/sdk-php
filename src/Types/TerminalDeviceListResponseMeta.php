<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TerminalDeviceListResponseMeta extends JsonSerializableType
{
    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
