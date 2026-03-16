<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsCheckResponseData extends JsonSerializableType
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
     * @var value-of<CustomersEntitlementsCheckResponseDataAccessLevel> $accessLevel
     */
    #[JsonProperty('accessLevel')]
    public string $accessLevel;

    /**
     * @var ?value-of<CustomersEntitlementsCheckResponseDataStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?CustomersEntitlementsCheckResponseDataBenefit $benefit
     */
    #[JsonProperty('benefit')]
    public ?CustomersEntitlementsCheckResponseDataBenefit $benefit;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   benefitKey: string,
     *   hasAccess: bool,
     *   accessLevel: value-of<CustomersEntitlementsCheckResponseDataAccessLevel>,
     *   status?: ?value-of<CustomersEntitlementsCheckResponseDataStatus>,
     *   benefit?: ?CustomersEntitlementsCheckResponseDataBenefit,
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
