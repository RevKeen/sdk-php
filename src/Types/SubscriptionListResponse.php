<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of subscriptions matching the query filters.
 */
class SubscriptionListResponse extends JsonSerializableType
{
    /**
     * @var array<SubscriptionListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([SubscriptionListResponseDataItem::class])]
    public array $data;

    /**
     * @var SubscriptionListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public SubscriptionListResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<SubscriptionListResponseDataItem>,
     *   pagination: SubscriptionListResponsePagination,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->pagination = $values['pagination'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
