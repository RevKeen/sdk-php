<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A preview of the next renewal charge, including line items, amounts, and billing date.
 */
class SubscriptionPreviewRenewalResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionPreviewRenewalResponseData $data
     */
    #[JsonProperty('data')]
    public SubscriptionPreviewRenewalResponseData $data;

    /**
     * @param array{
     *   data: SubscriptionPreviewRenewalResponseData,
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
