<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointRotateSecretResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpoint $data
     */
    #[JsonProperty('data')]
    public WebhookEndpoint $data;

    /**
     * @param array{
     *   data: WebhookEndpoint,
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
