<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsTestRequestCredentials;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsTestRequest extends JsonSerializableType
{
    /**
     * @var IntegrationsTestRequestCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public IntegrationsTestRequestCredentials $credentials;

    /**
     * @param array{
     *   credentials: IntegrationsTestRequestCredentials,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credentials = $values['credentials'];
    }
}
