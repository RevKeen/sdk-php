<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentAttemptSingleResponse extends JsonSerializableType
{
    /**
     * @var PaymentAttempt $data
     */
    #[JsonProperty('data')]
    public PaymentAttempt $data;

    /**
     * @param array{
     *   data: PaymentAttempt,
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
