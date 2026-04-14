<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PriceTier extends JsonSerializableType
{
    /**
     * @var ?int $upTo Upper bound of this tier (1-based inclusive). `null` = open-ended catch-all. Only the FINAL tier may set `up_to: null`.
     */
    #[JsonProperty('up_to')]
    public ?int $upTo;

    /**
     * @var ?int $unitAmountMinor Per-unit charge in minor currency units (cents). May be null if the tier charges only a flat fee.
     */
    #[JsonProperty('unit_amount_minor')]
    public ?int $unitAmountMinor;

    /**
     * @var ?int $flatAmountMinor Flat fee charged once when quantity enters this tier. May be null if the tier charges only a per-unit amount.
     */
    #[JsonProperty('flat_amount_minor')]
    public ?int $flatAmountMinor;

    /**
     * @param array{
     *   upTo?: ?int,
     *   unitAmountMinor?: ?int,
     *   flatAmountMinor?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->upTo = $values['upTo'] ?? null;
        $this->unitAmountMinor = $values['unitAmountMinor'] ?? null;
        $this->flatAmountMinor = $values['flatAmountMinor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
