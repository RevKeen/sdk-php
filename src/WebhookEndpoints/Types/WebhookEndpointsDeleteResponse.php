<?php

namespace RevKeen\WebhookEndpoints\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEndpointsDeleteResponse extends JsonSerializableType
{
    /**
     * @var WebhookEndpointsDeleteResponseData $data
     */
    #[JsonProperty('data')]
    public WebhookEndpointsDeleteResponseData $data;

    /**
     * @param array{
     *   data: WebhookEndpointsDeleteResponseData,
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
