<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsPutProductMappingsRequestMappingsItem extends JsonSerializableType
{
    /**
     * @var string $externalId
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @var string $internalId
     */
    #[JsonProperty('internalId')]
    public string $internalId;

    /**
     * @var ?IntegrationsPutProductMappingsRequestMappingsItemMetadata $metadata
     */
    #[JsonProperty('metadata')]
    public ?IntegrationsPutProductMappingsRequestMappingsItemMetadata $metadata;

    /**
     * @param array{
     *   externalId: string,
     *   internalId: string,
     *   metadata?: ?IntegrationsPutProductMappingsRequestMappingsItemMetadata,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->internalId = $values['internalId'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
