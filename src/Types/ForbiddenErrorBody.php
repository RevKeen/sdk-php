<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ForbiddenErrorBody extends JsonSerializableType
{
    /**
     * @var ForbiddenErrorError $error
     */
    #[JsonProperty('error')]
    public ForbiddenErrorError $error;

    /**
     * @param array{
     *   error: ForbiddenErrorError,
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
