<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class IntegrationsSyncStatesResponseDataItem extends JsonSerializableType
{
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
     * @var ?string $lastSyncStatus
     */
    #[JsonProperty('lastSyncStatus')]
    public ?string $lastSyncStatus;

    /**
     * @var ?float $itemsProcessed
     */
    #[JsonProperty('itemsProcessed')]
    public ?float $itemsProcessed;

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
     * @param array{
     *   resourceType: string,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncStatus?: ?string,
     *   itemsProcessed?: ?float,
     *   lastSyncError?: ?string,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceType = $values['resourceType'];
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncStatus = $values['lastSyncStatus'] ?? null;
        $this->itemsProcessed = $values['itemsProcessed'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
