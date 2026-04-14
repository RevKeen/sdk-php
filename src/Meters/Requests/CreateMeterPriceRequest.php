<?php

namespace RevKeen\Meters\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Meters\Types\CreateMeterPriceRequestPricingModel;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Meters\Types\CreateMeterPriceRequestTiersItem;
use RevKeen\Core\Types\ArrayType;

class CreateMeterPriceRequest extends JsonSerializableType
{
    /**
     * @var value-of<CreateMeterPriceRequestPricingModel> $pricingModel Pricing model
     */
    #[JsonProperty('pricing_model')]
    public string $pricingModel;

    /**
     * @var string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?int $unitAmountMinor Price per unit in minor units (for per_unit)
     */
    #[JsonProperty('unit_amount_minor')]
    public ?int $unitAmountMinor;

    /**
     * @var ?int $flatFeeMinor Base charge per period in minor units
     */
    #[JsonProperty('flat_fee_minor')]
    public ?int $flatFeeMinor;

    /**
     * @var ?int $packageSize Units per package (for package model)
     */
    #[JsonProperty('package_size')]
    public ?int $packageSize;

    /**
     * @var ?int $costPerUnitMinor Merchant's cost per unit for margin intelligence
     */
    #[JsonProperty('cost_per_unit_minor')]
    public ?int $costPerUnitMinor;

    /**
     * @var ?array<CreateMeterPriceRequestTiersItem> $tiers Tier configuration (for graduated and volume)
     */
    #[JsonProperty('tiers'), ArrayType([CreateMeterPriceRequestTiersItem::class])]
    public ?array $tiers;

    /**
     * @param array{
     *   pricingModel: value-of<CreateMeterPriceRequestPricingModel>,
     *   currency: string,
     *   unitAmountMinor?: ?int,
     *   flatFeeMinor?: ?int,
     *   packageSize?: ?int,
     *   costPerUnitMinor?: ?int,
     *   tiers?: ?array<CreateMeterPriceRequestTiersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pricingModel = $values['pricingModel'];
        $this->currency = $values['currency'];
        $this->unitAmountMinor = $values['unitAmountMinor'] ?? null;
        $this->flatFeeMinor = $values['flatFeeMinor'] ?? null;
        $this->packageSize = $values['packageSize'] ?? null;
        $this->costPerUnitMinor = $values['costPerUnitMinor'] ?? null;
        $this->tiers = $values['tiers'] ?? null;
    }
}
