<?php

namespace RevKeen\WebhookEndpoints\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class WebhookEndpointsListResponse extends JsonSerializableType
{
    /**
     * @var array<WebhookEndpointsListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([WebhookEndpointsListResponseDataItem::class])]
    public array $data;

    /**
     * @var WebhookEndpointsListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public WebhookEndpointsListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<WebhookEndpointsListResponseDataItem>,
     *   meta: WebhookEndpointsListResponseMeta,
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
