<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class Price extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the price
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PriceObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $productId ID of the product this price belongs to
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var bool $active Whether the price is active
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @var string $currency Three-letter ISO currency code (lowercase)
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?int $unitAmount Price in minor units (cents)
     */
    #[JsonProperty('unit_amount')]
    public ?int $unitAmount;

    /**
     * @var value-of<PriceType> $type Price type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<PricePricingModel> $pricingModel Pricing model
     */
    #[JsonProperty('pricing_model')]
    public string $pricingModel;

    /**
     * @var ?value-of<PriceInterval> $interval Billing interval (recurring only)
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount Number of intervals between billings
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var ?int $trialPeriodDays Trial period in days (recurring only)
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
     * @var ?array<int> $presetAmounts PWYW: quick-select amounts
     */
    #[JsonProperty('preset_amounts'), ArrayType(['integer'])]
    public ?array $presetAmounts;

    /**
     * @var ?string $nickname Display name (e.g., 'Monthly', 'Annual - Save 17%')
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
     * @var DateTime $createdAt Creation timestamp
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update timestamp
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<PriceObject>,
     *   productId: string,
     *   active: bool,
     *   currency: string,
     *   type: value-of<PriceType>,
     *   pricingModel: value-of<PricePricingModel>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   unitAmount?: ?int,
     *   interval?: ?value-of<PriceInterval>,
     *   intervalCount?: ?int,
     *   trialPeriodDays?: ?int,
     *   minimumAmount?: ?int,
     *   maximumAmount?: ?int,
     *   suggestedAmount?: ?int,
     *   presetAmounts?: ?array<int>,
     *   nickname?: ?string,
     *   lookupKey?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->productId = $values['productId'];
        $this->active = $values['active'];
        $this->currency = $values['currency'];
        $this->unitAmount = $values['unitAmount'] ?? null;
        $this->type = $values['type'];
        $this->pricingModel = $values['pricingModel'];
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialPeriodDays = $values['trialPeriodDays'] ?? null;
        $this->minimumAmount = $values['minimumAmount'] ?? null;
        $this->maximumAmount = $values['maximumAmount'] ?? null;
        $this->suggestedAmount = $values['suggestedAmount'] ?? null;
        $this->presetAmounts = $values['presetAmounts'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->lookupKey = $values['lookupKey'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
