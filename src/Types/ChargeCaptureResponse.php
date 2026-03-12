<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ChargeCaptureResponse extends JsonSerializableType
{
    /**
     * @var ChargeCaptureResponseData $data
     */
    #[JsonProperty('data')]
    public ChargeCaptureResponseData $data;

    /**
     * @param array{
     *   data: ChargeCaptureResponseData,
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
