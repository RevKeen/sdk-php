<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AuthenticationError extends JsonSerializableType
{
    /**
     * @var AuthenticationErrorError $error
     */
    #[JsonProperty('error')]
    public AuthenticationErrorError $error;

    /**
     * @param array{
     *   error: AuthenticationErrorError,
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
