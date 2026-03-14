<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class VoidCreateResponse extends JsonSerializableType
{
    /**
     * @var Void $data
     */
    #[JsonProperty('data')]
    public Void $data;

    /**
     * @param array{
     *   data: Void,
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
