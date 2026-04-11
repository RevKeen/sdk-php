<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The newly created void object confirming the unsettled payment was canceled.
 */
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
