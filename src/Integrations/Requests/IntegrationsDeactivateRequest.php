<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsDeactivateRequest extends JsonSerializableType
{
    /**
     * @var ?bool $deleteCredentials
     */
    #[JsonProperty('deleteCredentials')]
    public ?bool $deleteCredentials;

    /**
     * @param array{
     *   deleteCredentials?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deleteCredentials = $values['deleteCredentials'] ?? null;
    }
}
