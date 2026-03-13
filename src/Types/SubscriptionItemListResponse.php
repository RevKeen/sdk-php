<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SubscriptionItemListResponse extends JsonSerializableType
{
    /**
     * @var array<SubscriptionItem> $data
     */
    #[JsonProperty('data'), ArrayType([SubscriptionItem::class])]
    public array $data;

    /**
     * @var SubscriptionItemListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public SubscriptionItemListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<SubscriptionItem>,
     *   meta: SubscriptionItemListResponseMeta,
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
