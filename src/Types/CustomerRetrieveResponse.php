<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerRetrieveResponse extends JsonSerializableType
{
    /**
     * @var CustomerRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public CustomerRetrieveResponseData $data;

    /**
     * @param array{
     *   data: CustomerRetrieveResponseData,
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
