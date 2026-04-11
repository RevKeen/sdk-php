<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsListResponseDataItemProviderState extends JsonSerializableType
{
    /**
     * @var float $consecutiveErrors
     */
    #[JsonProperty('consecutiveErrors')]
    public float $consecutiveErrors;

    /**
     * @var ?string $lastErrorAt
     */
    #[JsonProperty('lastErrorAt')]
    public ?string $lastErrorAt;

    /**
     * @var ?string $lastSyncAt
     */
    #[JsonProperty('lastSyncAt')]
    public ?string $lastSyncAt;

    /**
     * @var string $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @param array{
     *   consecutiveErrors: float,
     *   mode: string,
     *   lastErrorAt?: ?string,
     *   lastSyncAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->consecutiveErrors = $values['consecutiveErrors'];
        $this->lastErrorAt = $values['lastErrorAt'] ?? null;
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->mode = $values['mode'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
