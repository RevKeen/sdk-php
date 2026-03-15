<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TaxRateErrorResponse extends JsonSerializableType
{
    /**
     * @var TaxRateErrorResponseError $error
     */
    #[JsonProperty('error')]
    public TaxRateErrorResponseError $error;

    /**
     * @param array{
     *   error: TaxRateErrorResponseError,
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
