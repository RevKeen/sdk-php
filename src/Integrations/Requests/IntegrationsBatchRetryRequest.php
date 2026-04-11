<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsBatchRetryRequest extends JsonSerializableType
{
    /**
     * @var string $integrationId
     */
    #[JsonProperty('integrationId')]
    public string $integrationId;

    /**
     * @var ?string $resourceType
     */
    #[JsonProperty('resourceType')]
    public ?string $resourceType;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @param array{
     *   integrationId: string,
     *   resourceType?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->integrationId = $values['integrationId'];
        $this->resourceType = $values['resourceType'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
