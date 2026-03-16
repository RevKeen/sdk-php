<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\Union;

class IntegrationsGetPackagesResponseDataItem extends JsonSerializableType
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
     * @var ?string $publicName
     */
    #[JsonProperty('public_name')]
    public ?string $publicName;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $packageType
     */
    #[JsonProperty('package_type')]
    public ?string $packageType;

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
     * @var ?float $visits
     */
    #[JsonProperty('visits')]
    public ?float $visits;

    /**
     * @var (
     *    bool
     *   |float
     * )|null $active
     */
    #[JsonProperty('active'), Union('bool', 'float', 'null')]
    public bool|float|null $active;

    /**
     * @param array{
     *   id: (
     *    string
     *   |float
     * ),
     *   name: string,
     *   publicName?: ?string,
     *   type?: ?string,
     *   packageType?: ?string,
     *   chargeType?: ?string,
     *   price?: ?float,
     *   visits?: ?float,
     *   active?: (
     *    bool
     *   |float
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->publicName = $values['publicName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->packageType = $values['packageType'] ?? null;
        $this->chargeType = $values['chargeType'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->visits = $values['visits'] ?? null;
        $this->active = $values['active'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
