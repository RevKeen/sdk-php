<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CreateMeterResponse extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $data Created meter object
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public array $data;

    /**
     * @param array{
     *   data: array<string, mixed>,
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
