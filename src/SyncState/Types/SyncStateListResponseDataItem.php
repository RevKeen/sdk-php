<?php

namespace RevKeen\SyncState\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class SyncStateListResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var string $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $resourceType
     */
    #[JsonProperty('resourceType')]
    public string $resourceType;

    /**
     * @var ?DateTime $lastSyncAt
     */
    #[JsonProperty('lastSyncAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncAt;

    /**
     * @var ?value-of<SyncStateListResponseDataItemLastSyncStatus> $lastSyncStatus
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
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   merchantId: string,
     *   provider: string,
     *   resourceType: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncStatus?: ?value-of<SyncStateListResponseDataItemLastSyncStatus>,
     *   lastSyncError?: ?string,
     *   cursor?: ?string,
     *   itemsSynced?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->provider = $values['provider'];
        $this->resourceType = $values['resourceType'];
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncStatus = $values['lastSyncStatus'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->itemsSynced = $values['itemsSynced'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
