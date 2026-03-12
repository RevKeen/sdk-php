<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class BillingAnchorRulesResponse extends JsonSerializableType
{
    /**
     * @var array<BillingAnchorRulesResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([BillingAnchorRulesResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<BillingAnchorRulesResponseDataItem>,
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
