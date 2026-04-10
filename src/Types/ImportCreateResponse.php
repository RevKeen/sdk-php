<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The created import job in 'pending' status.
 */
class ImportCreateResponse extends JsonSerializableType
{
    /**
     * @var Import $data
     */
    #[JsonProperty('data')]
    public Import $data;

    /**
     * @param array{
     *   data: Import,
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
