<?php

namespace RevKeen\Meters\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreateMeterPriceRequestTiersItem extends JsonSerializableType
{
    /**
     * @var int $firstUnit Start of tier range
     */
    #[JsonProperty('first_unit')]
    public int $firstUnit;

    /**
     * @var ?int $lastUnit End of tier range (null = unbounded)
     */
    #[JsonProperty('last_unit')]
    public ?int $lastUnit;

    /**
     * @var int $unitAmountMinor Per-unit price in this tier (minor units)
     */
    #[JsonProperty('unit_amount_minor')]
    public int $unitAmountMinor;

    /**
     * @var ?int $flatAmountMinor Flat fee for entering this tier (minor units)
     */
    #[JsonProperty('flat_amount_minor')]
    public ?int $flatAmountMinor;

    /**
     * @param array{
     *   firstUnit: int,
     *   unitAmountMinor: int,
     *   lastUnit?: ?int,
     *   flatAmountMinor?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->firstUnit = $values['firstUnit'];
        $this->lastUnit = $values['lastUnit'] ?? null;
        $this->unitAmountMinor = $values['unitAmountMinor'];
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
