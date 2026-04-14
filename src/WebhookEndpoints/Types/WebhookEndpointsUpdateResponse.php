<?php

namespace RevKeen\WebhookEndpoints\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointsUpdateResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointsUpdateResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointsUpdateResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointsUpdateResponseData,
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
