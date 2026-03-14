<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ValidationError extends JsonSerializableType
{
    /**
     * @var ValidationErrorError $error
     */
    #[JsonProperty('error')]
    public ValidationErrorError $error;

    /**
     * @param array{
     *   error: ValidationErrorError,
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
