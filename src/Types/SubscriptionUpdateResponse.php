<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionUpdateResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionUpdateResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionUpdateResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionUpdateResponseData,
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
