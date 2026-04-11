<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The created export job in 'pending' status.
 */
class ExportCreateResponse extends JsonSerializableType
{
    /**
     * @var Export $data
     */
    #[JsonProperty('data')]
    public Export $data;

    /**
     * @param array{
     *   data: Export,
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
