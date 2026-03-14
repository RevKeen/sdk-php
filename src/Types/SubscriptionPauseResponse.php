<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionPauseResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionPauseResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionPauseResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionPauseResponseData,
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
