<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * The subscription after a plan change, with proration details and updated billing schedule.
 */
class SubscriptionChangePlanResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionChangePlanResponseSubscription $subscription
     */
    #[JsonProperty('subscription')]
    public SubscriptionChangePlanResponseSubscription $subscription;

    /**
     * @var ?array<string, mixed> $proration Proration details
     */
    #[JsonProperty('proration'), ArrayType(['string' => 'mixed'])]
    public ?array $proration;

    /**
     * @var ?string $previousPlanId
     */
    #[JsonProperty('previousPlanId')]
    public ?string $previousPlanId;

    /**
     * @var bool $invoiceCreated
     */
    #[JsonProperty('invoiceCreated')]
    public bool $invoiceCreated;

    /**
     * @param array{
     *   subscription: SubscriptionChangePlanResponseSubscription,
     *   invoiceCreated: bool,
     *   proration?: ?array<string, mixed>,
     *   previousPlanId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscription = $values['subscription'];
        $this->proration = $values['proration'] ?? null;
        $this->previousPlanId = $values['previousPlanId'] ?? null;
        $this->invoiceCreated = $values['invoiceCreated'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
