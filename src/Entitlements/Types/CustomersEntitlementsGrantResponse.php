<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsGrantResponse extends JsonSerializableType
{
    /**
     * @var CustomersEntitlementsGrantResponseData $data
     */
    #[JsonProperty('data')]
    public CustomersEntitlementsGrantResponseData $data;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   data: CustomersEntitlementsGrantResponseData,
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
