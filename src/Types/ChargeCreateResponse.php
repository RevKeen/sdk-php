<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The newly created charge object with gateway response details.
 */
class ChargeCreateResponse extends JsonSerializableType
{
    /**
     * @var ChargeCreateResponseData $data
     */
    #[JsonProperty('data')]
    public ChargeCreateResponseData $data;

    /**
     * @param array{
     *   data: ChargeCreateResponseData,
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
