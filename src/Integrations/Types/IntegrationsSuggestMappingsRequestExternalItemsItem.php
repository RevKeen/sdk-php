<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsSuggestMappingsRequestExternalItemsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $chargeType
     */
    #[JsonProperty('charge_type')]
    public ?string $chargeType;

    /**
     * @var ?float $price
     */
    #[JsonProperty('price')]
    public ?float $price;

    /**
     * @var value-of<IntegrationsSuggestMappingsRequestExternalItemsItemSource> $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   source: value-of<IntegrationsSuggestMappingsRequestExternalItemsItemSource>,
     *   type?: ?string,
     *   chargeType?: ?string,
     *   price?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->type = $values['type'] ?? null;
        $this->chargeType = $values['chargeType'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->source = $values['source'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
