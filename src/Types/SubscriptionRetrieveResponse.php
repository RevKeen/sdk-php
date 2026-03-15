<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionRetrieveResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionRetrieveResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionRetrieveResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionRetrieveResponseData,
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
