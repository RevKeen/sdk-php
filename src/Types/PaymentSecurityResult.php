<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentSecurityResult extends JsonSerializableType
{
    /**
     * @var ?AvsCodeInterpretation $avs
     */
    #[JsonProperty('avs')]
    public ?AvsCodeInterpretation $avs;

    /**
     * @var ?CvvCodeInterpretation $cvv
     */
    #[JsonProperty('cvv')]
    public ?CvvCodeInterpretation $cvv;

    /**
     * @var value-of<PaymentSecurityResultOverallRiskLevel> $overallRiskLevel Combined risk level from AVS + CVV checks
     */
    #[JsonProperty('overall_risk_level')]
    public string $overallRiskLevel;

    /**
     * @var value-of<PaymentSecurityResultRecommendation> $recommendation Recommended action based on security checks
     */
    #[JsonProperty('recommendation')]
    public string $recommendation;

    /**
     * @param array{
     *   overallRiskLevel: value-of<PaymentSecurityResultOverallRiskLevel>,
     *   recommendation: value-of<PaymentSecurityResultRecommendation>,
     *   avs?: ?AvsCodeInterpretation,
     *   cvv?: ?CvvCodeInterpretation,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->avs = $values['avs'] ?? null;
        $this->cvv = $values['cvv'] ?? null;
        $this->overallRiskLevel = $values['overallRiskLevel'];
        $this->recommendation = $values['recommendation'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
