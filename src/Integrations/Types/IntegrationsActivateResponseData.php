<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

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
     * @var ?bool $syncEnabled
     */
    #[JsonProperty('syncEnabled')]
    public ?bool $syncEnabled;

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
     * @var ?value-of<IntegrationsActivateResponseDataSyncHealth> $syncHealth
     */
    #[JsonProperty('syncHealth')]
    public ?string $syncHealth;

    /**
     * @var ?IntegrationsActivateResponseDataProviderState $providerState
     */
    #[JsonProperty('providerState')]
    public ?IntegrationsActivateResponseDataProviderState $providerState;

    /**
     * @var ?IntegrationsActivateResponseDataSyncInterval $syncInterval
     */
    #[JsonProperty('syncInterval')]
    public ?IntegrationsActivateResponseDataSyncInterval $syncInterval;

    /**
     * @var ?array<string, mixed> $configuration
     */
    #[JsonProperty('configuration'), ArrayType(['string' => 'mixed'])]
    public ?array $configuration;

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
     *   syncEnabled?: ?bool,
     *   status?: ?value-of<IntegrationsActivateResponseDataStatus>,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncError?: ?string,
     *   syncHealth?: ?value-of<IntegrationsActivateResponseDataSyncHealth>,
     *   providerState?: ?IntegrationsActivateResponseDataProviderState,
     *   syncInterval?: ?IntegrationsActivateResponseDataSyncInterval,
     *   configuration?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->provider = $values['provider'];
        $this->isActive = $values['isActive'];
        $this->syncEnabled = $values['syncEnabled'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->syncHealth = $values['syncHealth'] ?? null;
        $this->providerState = $values['providerState'] ?? null;
        $this->syncInterval = $values['syncInterval'] ?? null;
        $this->configuration = $values['configuration'] ?? null;
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
