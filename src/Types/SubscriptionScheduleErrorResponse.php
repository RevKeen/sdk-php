<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SubscriptionScheduleErrorResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionScheduleErrorResponseError $error
     */
    #[JsonProperty('error')]
    public SubscriptionScheduleErrorResponseError $error;

    /**
     * @param array{
     *   error: SubscriptionScheduleErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
