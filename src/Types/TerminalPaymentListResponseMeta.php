<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TerminalPaymentListResponseMeta extends JsonSerializableType
{
    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @param array{
     *   count: float,
     *   limit: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
        $this->limit = $values['limit'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
