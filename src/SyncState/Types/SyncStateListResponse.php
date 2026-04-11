<?php

namespace RevKeen\SyncState\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SyncStateListResponse extends JsonSerializableType
{
    /**
     * @var array<SyncStateListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([SyncStateListResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<SyncStateListResponseDataItem>,
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
