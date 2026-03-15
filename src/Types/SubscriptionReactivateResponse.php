<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionReactivateResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionReactivateResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionReactivateResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionReactivateResponseData,
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
