<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class BillingAnchorRulesResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var bool $requiresAnchorDay
     */
    #[JsonProperty('requiresAnchorDay')]
    public bool $requiresAnchorDay;

    /**
     * @param array{
     *   value: string,
     *   label: string,
     *   description: string,
     *   requiresAnchorDay: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
        $this->label = $values['label'];
        $this->description = $values['description'];
        $this->requiresAnchorDay = $values['requiresAnchorDay'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
