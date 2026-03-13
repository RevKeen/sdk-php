<?php

namespace RevKeen\Apps\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class GetAppsEntitlementsResponse extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $entitlements Entitlements object
     */
    #[JsonProperty('entitlements'), ArrayType(['string' => 'mixed'])]
    public array $entitlements;

    /**
     * @param array{
     *   entitlements: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->entitlements = $values['entitlements'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
