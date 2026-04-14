<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Optional quantity transform (package pricing) applied before tier lookup.
 */
class TransformQuantity extends JsonSerializableType
{
    /**
     * @var int $divideBy Package size — quantity is divided by this value before pricing. Must be >= 1. Example: `divide_by: 10` with `round: up` charges per pack of 10.
     */
    #[JsonProperty('divide_by')]
    public int $divideBy;

    /**
     * @var value-of<TransformQuantityRound> $round Rounding mode when quantity is not an exact multiple of `divide_by`.
     */
    #[JsonProperty('round')]
    public string $round;

    /**
     * @param array{
     *   divideBy: int,
     *   round: value-of<TransformQuantityRound>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->divideBy = $values['divideBy'];
        $this->round = $values['round'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
