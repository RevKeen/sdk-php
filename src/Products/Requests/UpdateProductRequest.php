<?php

namespace RevKeen\Products\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Products\Types\UpdateProductRequestFulfillmentType;
use RevKeen\Products\Types\UpdateProductRequestBillingAnchorRule;
use RevKeen\Products\Types\UpdateProductRequestFirstChargeBehavior;
use RevKeen\Products\Types\UpdateProductRequestEndBehavior;
use RevKeen\Core\Types\ArrayType;

class UpdateProductRequest extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public ?int $amountMinor;

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
     * @var ?bool $isActive
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?bool $isArchived
     */
    #[JsonProperty('is_archived')]
    public ?bool $isArchived;

    /**
     * @var ?value-of<UpdateProductRequestFulfillmentType> $fulfillmentType Fulfillment type for the product.
     */
    #[JsonProperty('fulfillment_type')]
    public ?string $fulfillmentType;

    /**
     * @var ?value-of<UpdateProductRequestBillingAnchorRule> $billingAnchorRule How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month.
     */
    #[JsonProperty('billing_anchor_rule')]
    public ?string $billingAnchorRule;

    /**
     * @var ?int $billingAnchorDay
     */
    #[JsonProperty('billing_anchor_day')]
    public ?int $billingAnchorDay;

    /**
     * @var ?value-of<UpdateProductRequestFirstChargeBehavior> $firstChargeBehavior When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date.
     */
    #[JsonProperty('first_charge_behavior')]
    public ?string $firstChargeBehavior;

    /**
     * @var ?value-of<UpdateProductRequestEndBehavior> $endBehavior How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles.
     */
    #[JsonProperty('end_behavior')]
    public ?string $endBehavior;

    /**
     * @var ?int $maxPayments
     */
    #[JsonProperty('max_payments')]
    public ?int $maxPayments;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary key-value metadata for the product
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   amountMinor?: ?int,
     *   currency?: ?string,
     *   interval?: ?string,
     *   intervalCount?: ?int,
     *   trialDays?: ?int,
     *   isActive?: ?bool,
     *   isArchived?: ?bool,
     *   fulfillmentType?: ?value-of<UpdateProductRequestFulfillmentType>,
     *   billingAnchorRule?: ?value-of<UpdateProductRequestBillingAnchorRule>,
     *   billingAnchorDay?: ?int,
     *   firstChargeBehavior?: ?value-of<UpdateProductRequestFirstChargeBehavior>,
     *   endBehavior?: ?value-of<UpdateProductRequestEndBehavior>,
     *   maxPayments?: ?int,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->trialDays = $values['trialDays'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->isArchived = $values['isArchived'] ?? null;
        $this->fulfillmentType = $values['fulfillmentType'] ?? null;
        $this->billingAnchorRule = $values['billingAnchorRule'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->firstChargeBehavior = $values['firstChargeBehavior'] ?? null;
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->maxPayments = $values['maxPayments'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
