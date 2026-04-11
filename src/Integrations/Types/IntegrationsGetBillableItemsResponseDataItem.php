<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Union;

class IntegrationsGetBillableItemsResponseDataItem extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |float
     * ) $id
     */
    #[JsonProperty('id'), Union('string', 'float')]
    public string|float $id;

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
     * @var value-of<IntegrationsGetBillableItemsResponseDataItemSource> $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @param array{
     *   id: (
     *    string
     *   |float
     * ),
     *   name: string,
     *   source: value-of<IntegrationsGetBillableItemsResponseDataItemSource>,
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
