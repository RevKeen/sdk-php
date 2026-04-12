<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Error response returned when a price operation fails.
 */
class PriceErrorResponse extends JsonSerializableType
{
    /**
     * @var PriceErrorResponseError $error
     */
    #[JsonProperty('error')]
    public PriceErrorResponseError $error;

    /**
     * @param array{
     *   error: PriceErrorResponseError,
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
