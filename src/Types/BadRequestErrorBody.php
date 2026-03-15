<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class BadRequestErrorBody extends JsonSerializableType
{
    /**
     * @var BadRequestErrorBodyError $error
     */
    #[JsonProperty('error')]
    public BadRequestErrorBodyError $error;

    /**
     * @param array{
     *   error: BadRequestErrorBodyError,
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
