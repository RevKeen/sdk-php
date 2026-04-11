<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsRevokeByIdResponse extends JsonSerializableType
{
    /**
     * @var CustomersEntitlementsRevokeByIdResponseData $data
     */
    #[JsonProperty('data')]
    public CustomersEntitlementsRevokeByIdResponseData $data;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   data: CustomersEntitlementsRevokeByIdResponseData,
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
