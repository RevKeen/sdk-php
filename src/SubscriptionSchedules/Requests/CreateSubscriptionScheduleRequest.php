<?php

namespace RevKeen\SubscriptionSchedules\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\SubscriptionSchedules\Types\CreateSubscriptionScheduleRequestStartDateZero;
use DateTime;
use RevKeen\Core\Types\Union;
use RevKeen\Types\SchedulePhase;
use RevKeen\Core\Types\ArrayType;
use RevKeen\SubscriptionSchedules\Types\CreateSubscriptionScheduleRequestEndBehavior;

class CreateSubscriptionScheduleRequest extends JsonSerializableType
{
    /**
     * @var ?string $customer Customer ID (required if no subscription)
     */
    #[JsonProperty('customer')]
    public ?string $customer;

    /**
     * @var ?string $subscription Existing subscription to attach schedule to
     */
    #[JsonProperty('subscription')]
    public ?string $subscription;

    /**
     * @var (
     *    value-of<CreateSubscriptionScheduleRequestStartDateZero>
     *   |DateTime
     *   |int
     * )|null $startDate When schedule starts. 'now', ISO date, or Unix timestamp. Defaults to now.
     */
    #[JsonProperty('start_date'), Union('string', 'datetime', 'integer', 'null')]
    public string|DateTime|int|null $startDate;

    /**
     * @var array<SchedulePhase> $phases Phases defining the schedule (at least one required)
     */
    #[JsonProperty('phases'), ArrayType([SchedulePhase::class])]
    public array $phases;

    /**
     * @var ?value-of<CreateSubscriptionScheduleRequestEndBehavior> $endBehavior What happens when all phases complete
     */
    #[JsonProperty('end_behavior')]
    public ?string $endBehavior;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   phases: array<SchedulePhase>,
     *   customer?: ?string,
     *   subscription?: ?string,
     *   startDate?: (
     *    value-of<CreateSubscriptionScheduleRequestStartDateZero>
     *   |DateTime
     *   |int
     * )|null,
     *   endBehavior?: ?value-of<CreateSubscriptionScheduleRequestEndBehavior>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customer = $values['customer'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->phases = $values['phases'];
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
