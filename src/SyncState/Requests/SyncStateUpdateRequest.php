<?php

namespace RevKeen\SyncState\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Date;
use RevKeen\SyncState\Types\SyncStateUpdateRequestLastSyncStatus;

class SyncStateUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $lastSyncAt
     */
    #[JsonProperty('lastSyncAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncAt;

    /**
     * @var ?value-of<SyncStateUpdateRequestLastSyncStatus> $lastSyncStatus
     */
    #[JsonProperty('lastSyncStatus')]
    public ?string $lastSyncStatus;

    /**
     * @var ?string $lastSyncError
     */
    #[JsonProperty('lastSyncError')]
    public ?string $lastSyncError;

    /**
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    public ?string $cursor;

    /**
     * @var ?float $itemsSynced
     */
    #[JsonProperty('itemsSynced')]
    public ?float $itemsSynced;

    /**
     * @param array{
     *   lastSyncAt?: ?DateTime,
     *   lastSyncStatus?: ?value-of<SyncStateUpdateRequestLastSyncStatus>,
     *   lastSyncError?: ?string,
     *   cursor?: ?string,
     *   itemsSynced?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncStatus = $values['lastSyncStatus'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->itemsSynced = $values['itemsSynced'] ?? null;
    }
}
