<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsTestRequestCredentials extends JsonSerializableType
{
    /**
     * @var string $apiKey
     */
    #[JsonProperty('apiKey')]
    public string $apiKey;

    /**
     * @var string $baseUrl
     */
    #[JsonProperty('baseUrl')]
    public string $baseUrl;

    /**
     * @var ?string $appName
     */
    #[JsonProperty('appName')]
    public ?string $appName;

    /**
     * @var ?string $appEmail
     */
    #[JsonProperty('appEmail')]
    public ?string $appEmail;

    /**
     * @param array{
     *   apiKey: string,
     *   baseUrl: string,
     *   appName?: ?string,
     *   appEmail?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKey = $values['apiKey'];
        $this->baseUrl = $values['baseUrl'];
        $this->appName = $values['appName'] ?? null;
        $this->appEmail = $values['appEmail'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
