<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsCheckResponse extends JsonSerializableType
{
    /**
     * @var CustomersEntitlementsCheckResponseData $data
     */
    #[JsonProperty('data')]
    public CustomersEntitlementsCheckResponseData $data;

    /**
     * @param array{
     *   data: CustomersEntitlementsCheckResponseData,
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
