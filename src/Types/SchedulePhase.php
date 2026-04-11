<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A time-bounded phase within a subscription schedule, with its own pricing, quantities, and billing configuration.
 */
class SchedulePhase extends JsonSerializableType
{
    /**
     * @var array<PhaseItem> $items Products/prices included in this phase
     */
    #[JsonProperty('items'), ArrayType([PhaseItem::class])]
    public array $items;

    /**
     * @var string $startDate When this phase starts (ISO 8601 date)
     */
    #[JsonProperty('start_date')]
    public string $startDate;

    /**
     * @var ?string $endDate When this phase ends (null for indefinite)
     */
    #[JsonProperty('end_date')]
    public ?string $endDate;

    /**
     * @var ?value-of<SchedulePhaseProrationBehavior> $prorationBehavior How to handle prorations when entering this phase
     */
    #[JsonProperty('proration_behavior')]
    public ?string $prorationBehavior;

    /**
     * @var ?string $billingCycleAnchor Override billing cycle anchor for this phase
     */
    #[JsonProperty('billing_cycle_anchor')]
    public ?string $billingCycleAnchor;

    /**
     * @var ?string $defaultPaymentMethod Payment method to use for this phase
     */
    #[JsonProperty('default_payment_method')]
    public ?string $defaultPaymentMethod;

    /**
     * @var ?value-of<SchedulePhaseCollectionMethod> $collectionMethod How to collect payment for this phase
     */
    #[JsonProperty('collection_method')]
    public ?string $collectionMethod;

    /**
     * @var ?string $coupon Coupon code to apply during this phase
     */
    #[JsonProperty('coupon')]
    public ?string $coupon;

    /**
     * @var ?string $trialEnd End of trial period (if applicable)
     */
    #[JsonProperty('trial_end')]
    public ?string $trialEnd;

    /**
     * @var ?array<string, mixed> $metadata Phase-specific metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   items: array<PhaseItem>,
     *   startDate: string,
     *   endDate?: ?string,
     *   prorationBehavior?: ?value-of<SchedulePhaseProrationBehavior>,
     *   billingCycleAnchor?: ?string,
     *   defaultPaymentMethod?: ?string,
     *   collectionMethod?: ?value-of<SchedulePhaseCollectionMethod>,
     *   coupon?: ?string,
     *   trialEnd?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'] ?? null;
        $this->prorationBehavior = $values['prorationBehavior'] ?? null;
        $this->billingCycleAnchor = $values['billingCycleAnchor'] ?? null;
        $this->defaultPaymentMethod = $values['defaultPaymentMethod'] ?? null;
        $this->collectionMethod = $values['collectionMethod'] ?? null;
        $this->coupon = $values['coupon'] ?? null;
        $this->trialEnd = $values['trialEnd'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
