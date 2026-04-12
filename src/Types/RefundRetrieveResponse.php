<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single refund object with full details.
 */
class RefundRetrieveResponse extends JsonSerializableType
{
    /**
     * @var Refund $data
     */
    #[JsonProperty('data')]
    public Refund $data;

    /**
     * @param array{
     *   data: Refund,
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
