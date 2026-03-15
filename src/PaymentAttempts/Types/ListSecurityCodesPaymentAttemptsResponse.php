<?php

namespace RevKeen\PaymentAttempts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ListSecurityCodesPaymentAttemptsResponse extends JsonSerializableType
{
    /**
     * @var ListSecurityCodesPaymentAttemptsResponseData $data
     */
    #[JsonProperty('data')]
    public ListSecurityCodesPaymentAttemptsResponseData $data;

    /**
     * @param array{
     *   data: ListSecurityCodesPaymentAttemptsResponseData,
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
