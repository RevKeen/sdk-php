<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class EventErrorResponse extends JsonSerializableType
{
    /**
     * @var EventErrorResponseError $error
     */
    #[JsonProperty('error')]
    public EventErrorResponseError $error;

    /**
     * @param array{
     *   error: EventErrorResponseError,
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
