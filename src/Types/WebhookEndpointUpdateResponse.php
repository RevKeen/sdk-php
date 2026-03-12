<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointUpdateResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointUpdateResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointUpdateResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointUpdateResponseData,
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
