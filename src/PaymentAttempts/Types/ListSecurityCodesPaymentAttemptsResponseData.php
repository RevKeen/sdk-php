<?php

namespace RevKeen\PaymentAttempts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ListSecurityCodesPaymentAttemptsResponseData extends JsonSerializableType
{
    /**
     * @var array<ListSecurityCodesPaymentAttemptsResponseDataAvsCodesItem> $avsCodes
     */
    #[JsonProperty('avs_codes'), ArrayType([ListSecurityCodesPaymentAttemptsResponseDataAvsCodesItem::class])]
    public array $avsCodes;

    /**
     * @var array<ListSecurityCodesPaymentAttemptsResponseDataCvvCodesItem> $cvvCodes
     */
    #[JsonProperty('cvv_codes'), ArrayType([ListSecurityCodesPaymentAttemptsResponseDataCvvCodesItem::class])]
    public array $cvvCodes;

    /**
     * @param array{
     *   avsCodes: array<ListSecurityCodesPaymentAttemptsResponseDataAvsCodesItem>,
     *   cvvCodes: array<ListSecurityCodesPaymentAttemptsResponseDataCvvCodesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->avsCodes = $values['avsCodes'];
        $this->cvvCodes = $values['cvvCodes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
