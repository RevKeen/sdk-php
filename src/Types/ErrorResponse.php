<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Standard error response for customer sub-resource operations.
 */
class ErrorResponse extends JsonSerializableType
{
    /**
     * @var ErrorResponseError $error
     */
    #[JsonProperty('error')]
    public ErrorResponseError $error;

    /**
     * @param array{
     *   error: ErrorResponseError,
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
