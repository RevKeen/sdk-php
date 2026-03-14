<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerPortalSessionCreateResponse extends JsonSerializableType
{
    /**
     * @var CustomerPortalSessionCreateResponseData $data
     */
    #[JsonProperty('data')]
    public CustomerPortalSessionCreateResponseData $data;

    /**
     * @param array{
     *   data: CustomerPortalSessionCreateResponseData,
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
