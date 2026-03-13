<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsTriggerSyncRequest extends JsonSerializableType
{
    /**
     * @var ?bool $fullResync
     */
    #[JsonProperty('fullResync')]
    public ?bool $fullResync;

    /**
     * @param array{
     *   fullResync?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fullResync = $values['fullResync'] ?? null;
    }
}
