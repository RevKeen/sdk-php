<?php

namespace RevKeen\Meters\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Meters\Types\UpdateMeterPriceRequestTiersItem;
use RevKeen\Core\Types\ArrayType;

class UpdateMeterPriceRequest extends JsonSerializableType
{
    /**
     * @var ?int $unitAmountMinor
     */
    #[JsonProperty('unit_amount_minor')]
    public ?int $unitAmountMinor;

    /**
     * @var ?int $flatFeeMinor
     */
    #[JsonProperty('flat_fee_minor')]
    public ?int $flatFeeMinor;

    /**
     * @var ?int $packageSize
     */
    #[JsonProperty('package_size')]
    public ?int $packageSize;

    /**
     * @var ?int $costPerUnitMinor
     */
    #[JsonProperty('cost_per_unit_minor')]
    public ?int $costPerUnitMinor;

    /**
     * @var ?array<UpdateMeterPriceRequestTiersItem> $tiers
     */
    #[JsonProperty('tiers'), ArrayType([UpdateMeterPriceRequestTiersItem::class])]
    public ?array $tiers;

    /**
     * @param array{
     *   unitAmountMinor?: ?int,
     *   flatFeeMinor?: ?int,
     *   packageSize?: ?int,
     *   costPerUnitMinor?: ?int,
     *   tiers?: ?array<UpdateMeterPriceRequestTiersItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->unitAmountMinor = $values['unitAmountMinor'] ?? null;
        $this->flatFeeMinor = $values['flatFeeMinor'] ?? null;
        $this->packageSize = $values['packageSize'] ?? null;
        $this->costPerUnitMinor = $values['costPerUnitMinor'] ?? null;
        $this->tiers = $values['tiers'] ?? null;
    }
}
