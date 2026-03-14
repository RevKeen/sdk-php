<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsPostPaymentMethodsRequest extends JsonSerializableType
{
    /**
     * @var string $baseUrl
     */
    #[JsonProperty('baseUrl')]
    public string $baseUrl;

    /**
     * @var string $apiKey
     */
    #[JsonProperty('apiKey')]
    public string $apiKey;

    /**
     * @var ?string $contactEmail
     */
    #[JsonProperty('contactEmail')]
    public ?string $contactEmail;

    /**
     * @var ?string $tenantId
     */
    #[JsonProperty('tenantId')]
    public ?string $tenantId;

    /**
     * @param array{
     *   baseUrl: string,
     *   apiKey: string,
     *   contactEmail?: ?string,
     *   tenantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->baseUrl = $values['baseUrl'];
        $this->apiKey = $values['apiKey'];
        $this->contactEmail = $values['contactEmail'] ?? null;
        $this->tenantId = $values['tenantId'] ?? null;
    }
}
