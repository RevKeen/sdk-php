<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsPutProductMappingsRequestMappingsItem;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsPutProductMappingsRequest extends JsonSerializableType
{
    /**
     * @var array<IntegrationsPutProductMappingsRequestMappingsItem> $mappings
     */
    #[JsonProperty('mappings'), ArrayType([IntegrationsPutProductMappingsRequestMappingsItem::class])]
    public array $mappings;

    /**
     * @param array{
     *   mappings: array<IntegrationsPutProductMappingsRequestMappingsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mappings = $values['mappings'];
    }
}
