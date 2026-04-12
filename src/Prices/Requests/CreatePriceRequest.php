<?php

namespace RevKeen\Prices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Prices\Types\CreatePriceRequestType;
use RevKeen\Prices\Types\CreatePriceRequestPricingModel;
use RevKeen\Prices\Types\CreatePriceRequestInterval;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Prices\Types\CreatePriceRequestBillingScheme;
use RevKeen\Prices\Types\CreatePriceRequestTiersMode;
use RevKeen\Types\PriceTier;
use RevKeen\Types\TransformQuantity;

class CreatePriceRequest extends JsonSerializableType
{
    /**
     * @var string $productId ID of the product this price belongs to
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var ?string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?int $unitAmount Price in minor units (cents). Required for fixed pricing.
     */
    #[JsonProperty('unit_amount')]
    public ?int $unitAmount;

    /**
     * @var ?value-of<CreatePriceRequestType> $type Price type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?value-of<CreatePriceRequestPricingModel> $pricingModel Pricing model
     */
    #[JsonProperty('pricing_model')]
    public ?string $pricingModel;

    /**
     * @var ?value-of<CreatePriceRequestInterval> $interval Billing interval (required for recurring)
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount Number of intervals between billings (1-12)
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var ?int $trialPeriodDays Trial period in days (0-730)
     */
    #[JsonProperty('trial_period_days')]
    public ?int $trialPeriodDays;

    /**
     * @var ?int $minimumAmount PWYW: minimum amount in cents
     */
    #[JsonProperty('minimum_amount')]
    public ?int $minimumAmount;

    /**
     * @var ?int $maximumAmount PWYW: maximum amount in cents
     */
    #[JsonProperty('maximum_amount')]
    public ?int $maximumAmount;

    /**
     * @var ?int $suggestedAmount PWYW: suggested amount in cents
     */
    #[JsonProperty('suggested_amount')]
    public ?int $suggestedAmount;

    /**
     * @var ?array<int> $presetAmounts PWYW: quick-select amounts (max 10)
     */
    #[JsonProperty('preset_amounts'), ArrayType(['integer'])]
    public ?array $presetAmounts;

    /**
     * @var ?string $nickname Display name (e.g., 'Monthly', 'Annual')
     */
    #[JsonProperty('nickname')]
    public ?string $nickname;

    /**
     * @var ?string $lookupKey Stable key for API lookups
     */
    #[JsonProperty('lookup_key')]
    public ?string $lookupKey;

    /**
     * @var ?value-of<CreatePriceRequestBillingScheme> $billingScheme Billing scheme. Defaults to `per_unit`. Set to `tiered` with `tiers_mode` + `tiers` for graduated or volume pricing.
     */
    #[JsonProperty('billing_scheme')]
    public ?string $billingScheme;

    /**
     * @var ?value-of<CreatePriceRequestTiersMode> $tiersMode Tiered pricing mode. Required when `billing_scheme` is `tiered`, must be omitted otherwise.
     */
    #[JsonProperty('tiers_mode')]
    public ?string $tiersMode;

    /**
     * @var ?array<PriceTier> $tiers Price tiers (ordered by `up_to`, min 2, max 50). Required when `billing_scheme` is `tiered`. Final tier MUST have `up_to: null`.
     */
    #[JsonProperty('tiers'), ArrayType([PriceTier::class])]
    public ?array $tiers;

    /**
     * @var ?TransformQuantity $transformQuantity
     */
    #[JsonProperty('transform_quantity')]
    public ?TransformQuantity $transformQuantity;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   productId: string,
     *   currency?: ?string,
     *   unitAmount?: ?int,
     *   type?: ?value-of<CreatePriceRequestType>,
     *   pricingModel?: ?value-of<CreatePriceRequestPricingModel>,
     *   interval?: ?value-of<CreatePriceRequestInterval>,
     *   intervalCount?: ?int,
     *   trialPeriodDays?: ?int,
     *   minimumAmount?: ?int,
     *   maximumAmount?: ?int,
     *   suggestedAmount?: ?int,
     *   presetAmounts?: ?array<int>,
     *   nickname?: ?string,
     *   lookupKey?: ?string,
     *   billingScheme?: ?value-of<CreatePriceRequestBillingScheme>,
     *   tiersMode?: ?value-of<CreatePriceRequestTiersMode>,
     *   tiers?: ?array<PriceTier>,
     *   transformQuantity?: ?TransformQuantity,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->productId = $values['productId'];
        $this->currency = $values['currency'] ?? null;
        $this->unitAmount = $values['unitAmount'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->pricingModel = $values['pricingModel'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialPeriodDays = $values['trialPeriodDays'] ?? null;
        $this->minimumAmount = $values['minimumAmount'] ?? null;
        $this->maximumAmount = $values['maximumAmount'] ?? null;
        $this->suggestedAmount = $values['suggestedAmount'] ?? null;
        $this->presetAmounts = $values['presetAmounts'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->lookupKey = $values['lookupKey'] ?? null;
        $this->billingScheme = $values['billingScheme'] ?? null;
        $this->tiersMode = $values['tiersMode'] ?? null;
        $this->tiers = $values['tiers'] ?? null;
        $this->transformQuantity = $values['transformQuantity'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
