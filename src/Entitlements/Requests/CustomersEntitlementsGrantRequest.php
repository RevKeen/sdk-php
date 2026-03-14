<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

class CustomersEntitlementsGrantRequest extends JsonSerializableType
{
    /**
     * @var ?string $benefitId
     */
    #[JsonProperty('benefitId')]
    public ?string $benefitId;

    /**
     * @var ?string $benefitKey
     */
    #[JsonProperty('benefitKey')]
    public ?string $benefitKey;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   benefitId?: ?string,
     *   benefitKey?: ?string,
     *   expiresAt?: ?DateTime,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->benefitId = $values['benefitId'] ?? null;
        $this->benefitKey = $values['benefitKey'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
