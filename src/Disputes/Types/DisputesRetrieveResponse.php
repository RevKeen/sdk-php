<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DisputesRetrieveResponse extends JsonSerializableType
{
    /**
     * @var DisputesRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public DisputesRetrieveResponseData $data;

    /**
     * @param array{
     *   data: DisputesRetrieveResponseData,
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
