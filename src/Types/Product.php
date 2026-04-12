<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * A product defines what you sell — the name, billing type, price, and fulfillment method. Products can be one-time, recurring (subscription), or usage-based.
 */
class Product extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier (UUID)
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ProductObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $productId User-facing product identifier
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var string $name Product display name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description Product description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<ProductKind> $kind Product kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var value-of<ProductPricingModel> $pricingModel How the product is priced
     */
    #[JsonProperty('pricing_model')]
    public string $pricingModel;

    /**
     * @var ?int $amountMinor Price in minor units (cents/pence)
     */
    #[JsonProperty('amount_minor')]
    public ?int $amountMinor;

    /**
     * @var string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $interval Billing interval (day, week, month, year)
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount Number of intervals between billings
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var int $trialDays Free trial period in days
     */
    #[JsonProperty('trial_days')]
    public int $trialDays;

    /**
     * @var value-of<ProductFulfillmentType> $fulfillmentType Fulfillment type
     */
    #[JsonProperty('fulfillment_type')]
    public string $fulfillmentType;

    /**
     * @var ?value-of<ProductBillingAnchorRule> $billingAnchorRule Billing date calculation rule
     */
    #[JsonProperty('billing_anchor_rule')]
    public ?string $billingAnchorRule;

    /**
     * @var ?int $billingAnchorDay Day of month for billing (1-31)
     */
    #[JsonProperty('billing_anchor_day')]
    public ?int $billingAnchorDay;

    /**
     * @var ?value-of<ProductFirstChargeBehavior> $firstChargeBehavior First payment timing
     */
    #[JsonProperty('first_charge_behavior')]
    public ?string $firstChargeBehavior;

    /**
     * @var ?value-of<ProductEndBehavior> $endBehavior Subscription end behavior
     */
    #[JsonProperty('end_behavior')]
    public ?string $endBehavior;

    /**
     * @var ?int $maxPayments Max billing cycles for fixed-payment subscriptions
     */
    #[JsonProperty('max_payments')]
    public ?int $maxPayments;

    /**
     * @var ?string $usageMeterId Associated usage meter ID
     */
    #[JsonProperty('usage_meter_id')]
    public ?string $usageMeterId;

    /**
     * @var ?string $slug URL-friendly slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var bool $isActive Whether the product is active
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var bool $isArchived Whether the product is archived
     */
    #[JsonProperty('is_archived')]
    public bool $isArchived;

    /**
     * @var ?string $imageUrl Product image URL
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?string $taxBehavior Tax behavior (exclusive, inclusive, location)
     */
    #[JsonProperty('tax_behavior')]
    public ?string $taxBehavior;

    /**
     * @var ?string $taxCode Tax code for tax calculation
     */
    #[JsonProperty('tax_code')]
    public ?string $taxCode;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var DateTime $createdAt Creation timestamp (ISO 8601)
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update timestamp (ISO 8601)
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<ProductObject>,
     *   productId: string,
     *   name: string,
     *   kind: value-of<ProductKind>,
     *   pricingModel: value-of<ProductPricingModel>,
     *   currency: string,
     *   trialDays: int,
     *   fulfillmentType: value-of<ProductFulfillmentType>,
     *   isActive: bool,
     *   isArchived: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   amountMinor?: ?int,
     *   interval?: ?string,
     *   intervalCount?: ?int,
     *   billingAnchorRule?: ?value-of<ProductBillingAnchorRule>,
     *   billingAnchorDay?: ?int,
     *   firstChargeBehavior?: ?value-of<ProductFirstChargeBehavior>,
     *   endBehavior?: ?value-of<ProductEndBehavior>,
     *   maxPayments?: ?int,
     *   usageMeterId?: ?string,
     *   slug?: ?string,
     *   imageUrl?: ?string,
     *   taxBehavior?: ?string,
     *   taxCode?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->productId = $values['productId'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->kind = $values['kind'];
        $this->pricingModel = $values['pricingModel'];
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'];
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialDays = $values['trialDays'];
        $this->fulfillmentType = $values['fulfillmentType'];
        $this->billingAnchorRule = $values['billingAnchorRule'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->firstChargeBehavior = $values['firstChargeBehavior'] ?? null;
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->maxPayments = $values['maxPayments'] ?? null;
        $this->usageMeterId = $values['usageMeterId'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->isActive = $values['isActive'];
        $this->isArchived = $values['isArchived'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->taxBehavior = $values['taxBehavior'] ?? null;
        $this->taxCode = $values['taxCode'] ?? null;
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
