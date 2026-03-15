<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CheckoutSessionCreateResponse extends JsonSerializableType
{
    /**
     * @var CheckoutSessionCreateResponseData $data
     */
    #[JsonProperty('data')]
    public CheckoutSessionCreateResponseData $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: CheckoutSessionCreateResponseData,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
