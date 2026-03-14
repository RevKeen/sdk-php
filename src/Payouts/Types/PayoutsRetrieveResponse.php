<?php

namespace RevKeen\Payouts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\Payout;
use RevKeen\Core\Json\JsonProperty;

class PayoutsRetrieveResponse extends JsonSerializableType
{
    /**
     * @var Payout $data
     */
    #[JsonProperty('data')]
    public Payout $data;

    /**
     * @param array{
     *   data: Payout,
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
