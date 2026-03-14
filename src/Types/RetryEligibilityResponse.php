<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class RetryEligibilityResponse extends JsonSerializableType
{
    /**
     * @var RetryEligibilityResponseData $data
     */
    #[JsonProperty('data')]
    public RetryEligibilityResponseData $data;

    /**
     * @param array{
     *   data: RetryEligibilityResponseData,
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
