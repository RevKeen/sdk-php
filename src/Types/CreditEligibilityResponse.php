<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Shows whether an invoice is eligible for a credit note and the maximum amount that can be credited.
 */
class CreditEligibilityResponse extends JsonSerializableType
{
    /**
     * @var CreditEligibilityResponseData $data
     */
    #[JsonProperty('data')]
    public CreditEligibilityResponseData $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: CreditEligibilityResponseData,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
