<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsGetBillableItemsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<IntegrationsGetBillableItemsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([IntegrationsGetBillableItemsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   success: bool,
     *   data: array<IntegrationsGetBillableItemsResponseDataItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
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
