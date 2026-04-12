<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The created checkout session with the URL to redirect the customer to.
 */
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
