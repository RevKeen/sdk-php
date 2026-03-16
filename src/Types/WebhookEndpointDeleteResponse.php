<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointDeleteResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointDeleteResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointDeleteResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointDeleteResponseData,
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
