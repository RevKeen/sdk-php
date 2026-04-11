<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class IntegrationsSuggestMappingsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<IntegrationsSuggestMappingsResponseSuggestionsItem> $suggestions
     */
    #[JsonProperty('suggestions'), ArrayType([IntegrationsSuggestMappingsResponseSuggestionsItem::class])]
    public array $suggestions;

    /**
     * @param array{
     *   success: bool,
     *   suggestions: array<IntegrationsSuggestMappingsResponseSuggestionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->suggestions = $values['suggestions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
