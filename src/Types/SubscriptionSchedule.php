<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SubscriptionSchedule extends JsonSerializableType
{
    /**
     * @var string $id Public schedule ID (sub_sched_xxx)
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<SubscriptionScheduleObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var value-of<SubscriptionScheduleStatus> $status Schedule status. not_started: Scheduled for future. active: Currently executing phases. completed: All phases finished. canceled: Manually canceled. released: Detached from subscription.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $customer Customer ID
     */
    #[JsonProperty('customer')]
    public ?string $customer;

    /**
     * @var ?string $subscription Linked subscription ID
     */
    #[JsonProperty('subscription')]
    public ?string $subscription;

    /**
     * @var ?SubscriptionScheduleCurrentPhase $currentPhase Current phase being executed
     */
    #[JsonProperty('current_phase')]
    public ?SubscriptionScheduleCurrentPhase $currentPhase;

    /**
     * @var array<SchedulePhase> $phases All phases in the schedule
     */
    #[JsonProperty('phases'), ArrayType([SchedulePhase::class])]
    public array $phases;

    /**
     * @var value-of<SubscriptionScheduleEndBehavior> $endBehavior What happens when the schedule completes. cancel: Cancel the subscription. release: Make subscription standalone.
     */
    #[JsonProperty('end_behavior')]
    public string $endBehavior;

    /**
     * @var ?int $releasedAt When released (Unix timestamp)
     */
    #[JsonProperty('released_at')]
    public ?int $releasedAt;

    /**
     * @var ?string $releasedSubscription Subscription ID at release time
     */
    #[JsonProperty('released_subscription')]
    public ?string $releasedSubscription;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var int $created Unix timestamp of creation
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var bool $livemode Whether in live mode
     */
    #[JsonProperty('livemode')]
    public bool $livemode;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<SubscriptionScheduleObject>,
     *   status: value-of<SubscriptionScheduleStatus>,
     *   phases: array<SchedulePhase>,
     *   endBehavior: value-of<SubscriptionScheduleEndBehavior>,
     *   created: int,
     *   livemode: bool,
     *   customer?: ?string,
     *   subscription?: ?string,
     *   currentPhase?: ?SubscriptionScheduleCurrentPhase,
     *   releasedAt?: ?int,
     *   releasedSubscription?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->status = $values['status'];
        $this->customer = $values['customer'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
        $this->currentPhase = $values['currentPhase'] ?? null;
        $this->phases = $values['phases'];
        $this->endBehavior = $values['endBehavior'];
        $this->releasedAt = $values['releasedAt'] ?? null;
        $this->releasedSubscription = $values['releasedSubscription'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->created = $values['created'];
        $this->livemode = $values['livemode'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
