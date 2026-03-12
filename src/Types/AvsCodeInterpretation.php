<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * AVS verification result
 */
class AvsCodeInterpretation extends JsonSerializableType
{
    /**
     * @var string $code Raw AVS response code from gateway
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var value-of<AvsCodeInterpretationMatchType> $matchType Type of address match
     */
    #[JsonProperty('match_type')]
    public string $matchType;

    /**
     * @var ?bool $addressMatch Whether the street address matched
     */
    #[JsonProperty('address_match')]
    public ?bool $addressMatch;

    /**
     * @var ?bool $zipMatch Whether the ZIP/postal code matched
     */
    #[JsonProperty('zip_match')]
    public ?bool $zipMatch;

    /**
     * @var string $description Human-readable description of the AVS result
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var value-of<AvsCodeInterpretationRiskLevel> $riskLevel Risk level based on AVS result. low: full match, medium: partial match, high: no match
     */
    #[JsonProperty('risk_level')]
    public string $riskLevel;

    /**
     * @param array{
     *   code: string,
     *   matchType: value-of<AvsCodeInterpretationMatchType>,
     *   description: string,
     *   riskLevel: value-of<AvsCodeInterpretationRiskLevel>,
     *   addressMatch?: ?bool,
     *   zipMatch?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->matchType = $values['matchType'];
        $this->addressMatch = $values['addressMatch'] ?? null;
        $this->zipMatch = $values['zipMatch'] ?? null;
        $this->description = $values['description'];
        $this->riskLevel = $values['riskLevel'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
