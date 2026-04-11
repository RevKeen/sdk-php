<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsGetUnmappedAttemptsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $externalPackageId
     */
    #[JsonProperty('externalPackageId')]
    public string $externalPackageId;

    /**
     * @var ?string $externalPackageName
     */
    #[JsonProperty('externalPackageName')]
    public ?string $externalPackageName;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @var ?string $lastSeenAt
     */
    #[JsonProperty('lastSeenAt')]
    public ?string $lastSeenAt;

    /**
     * @param array{
     *   externalPackageId: string,
     *   count: float,
     *   externalPackageName?: ?string,
     *   lastSeenAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalPackageId = $values['externalPackageId'];
        $this->externalPackageName = $values['externalPackageName'] ?? null;
        $this->count = $values['count'];
        $this->lastSeenAt = $values['lastSeenAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
