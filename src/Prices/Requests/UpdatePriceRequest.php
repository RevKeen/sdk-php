<?php

namespace RevKeen\Prices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UpdatePriceRequest extends JsonSerializableType
{
    /**
     * @var ?bool $active Whether the price is active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?string $nickname Display name
     */
    #[JsonProperty('nickname')]
    public ?string $nickname;

    /**
     * @var ?string $lookupKey Stable key for API lookups
     */
    #[JsonProperty('lookup_key')]
    public ?string $lookupKey;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   active?: ?bool,
     *   nickname?: ?string,
     *   lookupKey?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->lookupKey = $values['lookupKey'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
