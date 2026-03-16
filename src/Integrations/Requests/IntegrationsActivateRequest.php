<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsActivateRequestCredentials;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsActivateRequest extends JsonSerializableType
{
    /**
     * @var IntegrationsActivateRequestCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public IntegrationsActivateRequestCredentials $credentials;

    /**
     * @var ?int $syncIntervalMinutes
     */
    #[JsonProperty('syncIntervalMinutes')]
    public ?int $syncIntervalMinutes;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @param array{
     *   credentials: IntegrationsActivateRequestCredentials,
     *   syncIntervalMinutes?: ?int,
     *   currency?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credentials = $values['credentials'];
        $this->syncIntervalMinutes = $values['syncIntervalMinutes'] ?? null;
        $this->currency = $values['currency'] ?? null;
    }
}
