<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class WebhookEndpointListResponse extends JsonSerializableType
{
    /**
     * @var array<WebhookEndpointListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([WebhookEndpointListResponseDataItem::class])]
    public array $data;

    /**
     * @var WebhookEndpointListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public WebhookEndpointListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<WebhookEndpointListResponseDataItem>,
     *   meta: WebhookEndpointListResponseMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->meta = $values['meta'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
