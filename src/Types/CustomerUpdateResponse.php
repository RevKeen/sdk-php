<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerUpdateResponse extends JsonSerializableType
{
    /**
     * @var CustomerUpdateResponseData $data
     */
    #[JsonProperty('data')]
    public CustomerUpdateResponseData $data;

    /**
     * @param array{
     *   data: CustomerUpdateResponseData,
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
