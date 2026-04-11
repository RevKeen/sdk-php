<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The subscription after being paused, showing the pause effective date and planned resume date.
 */
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
