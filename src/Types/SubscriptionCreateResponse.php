<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionCreateResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionCreateResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionCreateResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionCreateResponseData,
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
