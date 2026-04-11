<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The updated discount object reflecting the changes.
 */
class DiscountUpdateResponse extends JsonSerializableType
{
    /**
     * @var Discount $data
     */
    #[JsonProperty('data')]
    public Discount $data;

    /**
     * @param array{
     *   data: Discount,
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
