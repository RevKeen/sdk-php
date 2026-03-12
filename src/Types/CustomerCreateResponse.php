<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerCreateResponse extends JsonSerializableType
{
    /**
     * @var CustomerCreateResponseData $data
     */
    #[JsonProperty('data')]
    public CustomerCreateResponseData $data;

    /**
     * @param array{
     *   data: CustomerCreateResponseData,
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
