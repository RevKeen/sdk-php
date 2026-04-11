<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A preview of upcoming billing charges for a subscription, showing line items, amounts, and billing dates.
 */
class BillingPreviewResponse extends JsonSerializableType
{
    /**
     * @var BillingPreviewResponseData $data
     */
    #[JsonProperty('data')]
    public BillingPreviewResponseData $data;

    /**
     * @param array{
     *   data: BillingPreviewResponseData,
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
