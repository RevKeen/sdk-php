<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ChargeRefundResponse extends JsonSerializableType
{
    /**
     * @var ChargeRefundResponseData $data
     */
    #[JsonProperty('data')]
    public ChargeRefundResponseData $data;

    /**
     * @param array{
     *   data: ChargeRefundResponseData,
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
