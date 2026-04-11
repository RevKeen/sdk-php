<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsSuggestMappingsRequestExternalItemsItem;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsSuggestMappingsRequest extends JsonSerializableType
{
    /**
     * @var array<IntegrationsSuggestMappingsRequestExternalItemsItem> $externalItems
     */
    #[JsonProperty('externalItems'), ArrayType([IntegrationsSuggestMappingsRequestExternalItemsItem::class])]
    public array $externalItems;

    /**
     * @param array{
     *   externalItems: array<IntegrationsSuggestMappingsRequestExternalItemsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalItems = $values['externalItems'];
    }
}
