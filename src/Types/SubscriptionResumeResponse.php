<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionResumeResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionResumeResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionResumeResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionResumeResponseData,
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
