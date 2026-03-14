<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsListResponse extends JsonSerializableType
{
    /**
     * @var array<IntegrationsListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([IntegrationsListResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<IntegrationsListResponseDataItem>,
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
