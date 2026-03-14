<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class TerminalPaymentListResponse extends JsonSerializableType
{
    /**
     * @var array<TerminalPayment> $data
     */
    #[JsonProperty('data'), ArrayType([TerminalPayment::class])]
    public array $data;

    /**
     * @var TerminalPaymentListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public TerminalPaymentListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<TerminalPayment>,
     *   meta: TerminalPaymentListResponseMeta,
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
