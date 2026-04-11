<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The subscription after being canceled with the specified cancellation parameters.
 */
class SubscriptionCancelSubscriptionResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionCancelSubscriptionResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionCancelSubscriptionResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionCancelSubscriptionResponseData,
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
