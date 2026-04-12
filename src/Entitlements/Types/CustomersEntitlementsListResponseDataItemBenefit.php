<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsListResponseDataItemBenefit extends JsonSerializableType
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
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $benefitType
     */
    #[JsonProperty('benefitType')]
    public string $benefitType;

    /**
     * @var string $benefitKey
     */
    #[JsonProperty('benefitKey')]
    public string $benefitKey;

    /**
     * @var ?string $category
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?string $iconUrl
     */
    #[JsonProperty('iconUrl')]
    public ?string $iconUrl;

    /**
     * @var ?string $displayOrder
     */
    #[JsonProperty('displayOrder')]
    public ?string $displayOrder;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var mixed $defaultValue
     */
    #[JsonProperty('defaultValue')]
    public mixed $defaultValue;

    /**
     * @var mixed $config
     */
    #[JsonProperty('config')]
    public mixed $config;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   benefitType: string,
     *   benefitKey: string,
     *   description?: ?string,
     *   category?: ?string,
     *   iconUrl?: ?string,
     *   displayOrder?: ?string,
     *   isActive?: ?bool,
     *   defaultValue?: mixed,
     *   config?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->benefitType = $values['benefitType'];
        $this->benefitKey = $values['benefitKey'];
        $this->category = $values['category'] ?? null;
        $this->iconUrl = $values['iconUrl'] ?? null;
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->defaultValue = $values['defaultValue'] ?? null;
        $this->config = $values['config'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
