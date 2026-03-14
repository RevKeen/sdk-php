<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsSyncIntervalRequest extends JsonSerializableType
{
    /**
     * @var int $syncIntervalMinutes
     */
    #[JsonProperty('syncIntervalMinutes')]
    public int $syncIntervalMinutes;

    /**
     * @param array{
     *   syncIntervalMinutes: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->syncIntervalMinutes = $values['syncIntervalMinutes'];
    }
}
