<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentAttemptErrorResponse extends JsonSerializableType
{
    /**
     * @var string $error Error message
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @param array{
     *   error: string,
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
