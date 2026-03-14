<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class UnauthorizedErrorBody extends JsonSerializableType
{
    /**
     * @var UnauthorizedErrorBodyError $error
     */
    #[JsonProperty('error')]
    public UnauthorizedErrorBodyError $error;

    /**
     * @param array{
     *   error: UnauthorizedErrorBodyError,
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
