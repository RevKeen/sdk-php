<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class IntegrationsActivateResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<IntegrationsActivateResponseDataProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('isActive')]
    public bool $isActive;

    /**
     * @var ?value-of<IntegrationsActivateResponseDataStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $lastSyncAt
     */
    #[JsonProperty('lastSyncAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncAt;

    /**
     * @var ?string $lastSyncError
     */
    #[JsonProperty('lastSyncError')]
    public ?string $lastSyncError;

    /**
     * @var ?IntegrationsActivateResponseDataSyncInterval $syncInterval
     */
    #[JsonProperty('syncInterval')]
    public ?IntegrationsActivateResponseDataSyncInterval $syncInterval;

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
     *   provider: value-of<IntegrationsActivateResponseDataProvider>,
     *   isActive: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   status?: ?value-of<IntegrationsActivateResponseDataStatus>,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncError?: ?string,
     *   syncInterval?: ?IntegrationsActivateResponseDataSyncInterval,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->provider = $values['provider'];
        $this->isActive = $values['isActive'];
        $this->status = $values['status'] ?? null;
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->syncInterval = $values['syncInterval'] ?? null;
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
