<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsPaymentMappingsRequestMappingsItem;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsPaymentMappingsRequest extends JsonSerializableType
{
    /**
     * @var array<IntegrationsPaymentMappingsRequestMappingsItem> $mappings
     */
    #[JsonProperty('mappings'), ArrayType([IntegrationsPaymentMappingsRequestMappingsItem::class])]
    public array $mappings;

    /**
     * @param array{
     *   mappings: array<IntegrationsPaymentMappingsRequestMappingsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mappings = $values['mappings'];
    }
}
