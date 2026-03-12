<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsGetProductMappingsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<IntegrationsGetProductMappingsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([IntegrationsGetProductMappingsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   success: bool,
     *   data: array<IntegrationsGetProductMappingsResponseDataItem>,
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
