<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PaymentAttemptListResponse extends JsonSerializableType
{
    /**
     * @var array<PaymentAttempt> $data
     */
    #[JsonProperty('data'), ArrayType([PaymentAttempt::class])]
    public array $data;

    /**
     * @var PaymentAttemptListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public PaymentAttemptListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<PaymentAttempt>,
     *   meta: PaymentAttemptListResponseMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->meta = $values['meta'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
