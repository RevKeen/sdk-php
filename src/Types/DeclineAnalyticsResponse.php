<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DeclineAnalyticsResponse extends JsonSerializableType
{
    /**
     * @var DeclineAnalyticsResponseData $data
     */
    #[JsonProperty('data')]
    public DeclineAnalyticsResponseData $data;

    /**
     * @param array{
     *   data: DeclineAnalyticsResponseData,
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
