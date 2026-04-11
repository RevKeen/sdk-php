<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsSuggestMappingsResponseSuggestionsItem extends JsonSerializableType
{
    /**
     * @var string $externalId
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @var string $internalId
     */
    #[JsonProperty('internalId')]
    public string $internalId;

    /**
     * @var float $confidence
     */
    #[JsonProperty('confidence')]
    public float $confidence;

    /**
     * @var string $reasoning
     */
    #[JsonProperty('reasoning')]
    public string $reasoning;

    /**
     * @param array{
     *   externalId: string,
     *   internalId: string,
     *   confidence: float,
     *   reasoning: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->internalId = $values['internalId'];
        $this->confidence = $values['confidence'];
        $this->reasoning = $values['reasoning'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
