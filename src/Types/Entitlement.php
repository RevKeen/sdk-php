<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

class Entitlement extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var string $benefitId
     */
    #[JsonProperty('benefitId')]
    public string $benefitId;

    /**
     * @var ?Benefit $benefit
     */
    #[JsonProperty('benefit')]
    public ?Benefit $benefit;

    /**
     * @var DateTime $grantedAt
     */
    #[JsonProperty('grantedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $grantedAt;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public array $metadata;

    /**
     * @var value-of<EntitlementStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var bool $hasAccess
     */
    #[JsonProperty('hasAccess')]
    public bool $hasAccess;

    /**
     * @var value-of<EntitlementAccessLevel> $accessLevel
     */
    #[JsonProperty('accessLevel')]
    public string $accessLevel;

    /**
     * @var ?string $subscriptionId
     */
    #[JsonProperty('subscriptionId')]
    public ?string $subscriptionId;

    /**
     * @var ?string $subscriptionStatus
     */
    #[JsonProperty('subscriptionStatus')]
    public ?string $subscriptionStatus;

    /**
     * @param array{
     *   id: string,
     *   customerId: string,
     *   benefitId: string,
     *   grantedAt: DateTime,
     *   metadata: array<string, mixed>,
     *   status: value-of<EntitlementStatus>,
     *   hasAccess: bool,
     *   accessLevel: value-of<EntitlementAccessLevel>,
     *   benefit?: ?Benefit,
     *   expiresAt?: ?DateTime,
     *   subscriptionId?: ?string,
     *   subscriptionStatus?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'];
        $this->benefitId = $values['benefitId'];
        $this->benefit = $values['benefit'] ?? null;
        $this->grantedAt = $values['grantedAt'];
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->metadata = $values['metadata'];
        $this->status = $values['status'];
        $this->hasAccess = $values['hasAccess'];
        $this->accessLevel = $values['accessLevel'];
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->subscriptionStatus = $values['subscriptionStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
