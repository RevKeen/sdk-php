<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Union;

class MeterPriceError extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |MeterPriceErrorErrorMessage
     * ) $error
     */
    #[JsonProperty('error'), Union('string', MeterPriceErrorErrorMessage::class)]
    public string|MeterPriceErrorErrorMessage $error;

    /**
     * @param array{
     *   error: (
     *    string
     *   |MeterPriceErrorErrorMessage
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
