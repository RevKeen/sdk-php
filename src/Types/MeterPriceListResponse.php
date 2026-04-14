<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A list of prices attached to a meter.
 */
class MeterPriceListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data Array of price objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
