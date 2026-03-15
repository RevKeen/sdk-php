<?php

namespace RevKeen\SyncState\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class SyncStateUpdateResponse extends JsonSerializableType
{
    /**
     * @var SyncStateUpdateResponseData $data
     */
    #[JsonProperty('data')]
    public SyncStateUpdateResponseData $data;

    /**
     * @var bool $created
     */
    #[JsonProperty('created')]
    public bool $created;

    /**
     * @param array{
     *   data: SyncStateUpdateResponseData,
     *   created: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->created = $values['created'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
