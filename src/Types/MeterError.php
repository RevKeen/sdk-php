<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Union;

class MeterError extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |MeterErrorErrorMessage
     * ) $error
     */
    #[JsonProperty('error'), Union('string', MeterErrorErrorMessage::class)]
    public string|MeterErrorErrorMessage $error;

    /**
     * @param array{
     *   error: (
     *    string
     *   |MeterErrorErrorMessage
     * ),
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
