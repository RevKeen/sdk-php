<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class EntitlementCheck extends JsonSerializableType
{
    /**
     * @var string $benefitKey
     */
    #[JsonProperty('benefitKey')]
    public string $benefitKey;

    /**
     * @var bool $hasAccess
     */
    #[JsonProperty('hasAccess')]
    public bool $hasAccess;

    /**
     * @var value-of<EntitlementCheckAccessLevel> $accessLevel
     */
    #[JsonProperty('accessLevel')]
    public string $accessLevel;

    /**
     * @var ?value-of<EntitlementCheckStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?Benefit $benefit
     */
    #[JsonProperty('benefit')]
    public ?Benefit $benefit;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   benefitKey: string,
     *   hasAccess: bool,
     *   accessLevel: value-of<EntitlementCheckAccessLevel>,
     *   status?: ?value-of<EntitlementCheckStatus>,
     *   benefit?: ?Benefit,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->benefitKey = $values['benefitKey'];
        $this->hasAccess = $values['hasAccess'];
        $this->accessLevel = $values['accessLevel'];
        $this->status = $values['status'] ?? null;
        $this->benefit = $values['benefit'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
