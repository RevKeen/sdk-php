<?php

namespace RevKeen\Products\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Products\Types\CreateProductRequestKind;
use RevKeen\Products\Types\CreateProductRequestPricingModel;
use RevKeen\Products\Types\CreateProductRequestFulfillmentType;
use RevKeen\Products\Types\CreateProductRequestBillingAnchorRule;
use RevKeen\Products\Types\CreateProductRequestFirstChargeBehavior;
use RevKeen\Products\Types\CreateProductRequestEndBehavior;

class CreateProductRequest extends JsonSerializableType
{
    /**
     * @var string $productId
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<CreateProductRequestKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var value-of<CreateProductRequestPricingModel> $pricingModel
     */
    #[JsonProperty('pricing_model')]
    public string $pricingModel;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public int $amountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $interval
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var ?int $trialDays
     */
    #[JsonProperty('trial_days')]
    public ?int $trialDays;

    /**
     * @var ?string $usageMeterId
     */
    #[JsonProperty('usage_meter_id')]
    public ?string $usageMeterId;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?value-of<CreateProductRequestFulfillmentType> $fulfillmentType Fulfillment type for the product. Defaults to 'none' (service).
     */
    #[JsonProperty('fulfillment_type')]
    public ?string $fulfillmentType;

    /**
     * @var ?value-of<CreateProductRequestBillingAnchorRule> $billingAnchorRule How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month.
     */
    #[JsonProperty('billing_anchor_rule')]
    public ?string $billingAnchorRule;

    /**
     * @var ?int $billingAnchorDay Day of month (1-31) when billing_anchor_rule is 'day_of_month'
     */
    #[JsonProperty('billing_anchor_day')]
    public ?int $billingAnchorDay;

    /**
     * @var ?value-of<CreateProductRequestFirstChargeBehavior> $firstChargeBehavior When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date.
     */
    #[JsonProperty('first_charge_behavior')]
    public ?string $firstChargeBehavior;

    /**
     * @var ?value-of<CreateProductRequestEndBehavior> $endBehavior How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles.
     */
    #[JsonProperty('end_behavior')]
    public ?string $endBehavior;

    /**
     * @var ?int $maxPayments Max billing cycles when end_behavior is 'fixed_payments'
     */
    #[JsonProperty('max_payments')]
    public ?int $maxPayments;

    /**
     * @param array{
     *   productId: string,
     *   name: string,
     *   kind: value-of<CreateProductRequestKind>,
     *   pricingModel: value-of<CreateProductRequestPricingModel>,
     *   amountMinor: int,
     *   description?: ?string,
     *   currency?: ?string,
     *   interval?: ?string,
     *   intervalCount?: ?int,
     *   trialDays?: ?int,
     *   usageMeterId?: ?string,
     *   slug?: ?string,
     *   fulfillmentType?: ?value-of<CreateProductRequestFulfillmentType>,
     *   billingAnchorRule?: ?value-of<CreateProductRequestBillingAnchorRule>,
     *   billingAnchorDay?: ?int,
     *   firstChargeBehavior?: ?value-of<CreateProductRequestFirstChargeBehavior>,
     *   endBehavior?: ?value-of<CreateProductRequestEndBehavior>,
     *   maxPayments?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->productId = $values['productId'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->kind = $values['kind'];
        $this->pricingModel = $values['pricingModel'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialDays = $values['trialDays'] ?? null;
        $this->usageMeterId = $values['usageMeterId'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->fulfillmentType = $values['fulfillmentType'] ?? null;
        $this->billingAnchorRule = $values['billingAnchorRule'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->firstChargeBehavior = $values['firstChargeBehavior'] ?? null;
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->maxPayments = $values['maxPayments'] ?? null;
    }
}
