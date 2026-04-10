<?php

namespace RevKeen\WebhookEndpoints\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointsRetrieveResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointsRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointsRetrieveResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointsRetrieveResponseData,
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
