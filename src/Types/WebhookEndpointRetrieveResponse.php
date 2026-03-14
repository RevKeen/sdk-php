<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointRetrieveResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointRetrieveResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointRetrieveResponseData,
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
