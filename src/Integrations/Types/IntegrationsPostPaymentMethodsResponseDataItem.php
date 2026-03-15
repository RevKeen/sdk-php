<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsPostPaymentMethodsResponseDataItem extends JsonSerializableType
{
    /**
     * @var float $id
     */
    #[JsonProperty('id')]
    public float $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var bool $active
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @var float $sortOrder
     */
    #[JsonProperty('sort_order')]
    public float $sortOrder;

    /**
     * @param array{
     *   id: float,
     *   name: string,
     *   active: bool,
     *   sortOrder: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->active = $values['active'];
        $this->sortOrder = $values['sortOrder'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
