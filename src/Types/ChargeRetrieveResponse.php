<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single charge object with full details.
 */
class ChargeRetrieveResponse extends JsonSerializableType
{
    /**
     * @var ChargeRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public ChargeRetrieveResponseData $data;

    /**
     * @param array{
     *   data: ChargeRetrieveResponseData,
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
