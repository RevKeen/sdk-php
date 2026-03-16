<?php

namespace RevKeen\PaymentAttempts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ListSecurityCodesPaymentAttemptsResponseDataAvsCodesItem extends JsonSerializableType
{
    /**
     * @var string $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $matchType
     */
    #[JsonProperty('match_type')]
    public string $matchType;

    /**
     * @var ?bool $addressMatch
     */
    #[JsonProperty('address_match')]
    public ?bool $addressMatch;

    /**
     * @var ?bool $zipMatch
     */
    #[JsonProperty('zip_match')]
    public ?bool $zipMatch;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $riskLevel
     */
    #[JsonProperty('risk_level')]
    public string $riskLevel;

    /**
     * @param array{
     *   code: string,
     *   matchType: string,
     *   description: string,
     *   riskLevel: string,
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
