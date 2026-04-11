<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The newly added subscription line item.
 */
class SubscriptionItemCreateResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionItem $data
     */
    #[JsonProperty('data')]
    public SubscriptionItem $data;

    /**
     * @param array{
     *   data: SubscriptionItem,
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
