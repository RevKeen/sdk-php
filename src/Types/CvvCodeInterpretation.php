<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * CVV verification result
 */
class CvvCodeInterpretation extends JsonSerializableType
{
    /**
     * @var string $code Raw CVV response code from gateway
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var value-of<CvvCodeInterpretationMatchType> $matchType Type of CVV match
     */
    #[JsonProperty('match_type')]
    public string $matchType;

    /**
     * @var string $description Human-readable description of the CVV result
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var value-of<CvvCodeInterpretationRiskLevel> $riskLevel Risk level based on CVV result. low: match, medium: not processed, high: no match
     */
    #[JsonProperty('risk_level')]
    public string $riskLevel;

    /**
     * @param array{
     *   code: string,
     *   matchType: value-of<CvvCodeInterpretationMatchType>,
     *   description: string,
     *   riskLevel: value-of<CvvCodeInterpretationRiskLevel>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->matchType = $values['matchType'];
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
