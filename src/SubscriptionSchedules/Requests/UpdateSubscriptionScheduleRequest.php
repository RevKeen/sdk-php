<?php

namespace RevKeen\SubscriptionSchedules\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\SchedulePhase;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use RevKeen\SubscriptionSchedules\Types\UpdateSubscriptionScheduleRequestEndBehavior;
use RevKeen\SubscriptionSchedules\Types\UpdateSubscriptionScheduleRequestProrationBehavior;

class UpdateSubscriptionScheduleRequest extends JsonSerializableType
{
    /**
     * @var ?array<SchedulePhase> $phases Replace all phases
     */
    #[JsonProperty('phases'), ArrayType([SchedulePhase::class])]
    public ?array $phases;

    /**
     * @var ?value-of<UpdateSubscriptionScheduleRequestEndBehavior> $endBehavior What happens when all phases complete
     */
    #[JsonProperty('end_behavior')]
    public ?string $endBehavior;

    /**
     * @var ?value-of<UpdateSubscriptionScheduleRequestProrationBehavior> $prorationBehavior Proration behavior when updating phases
     */
    #[JsonProperty('proration_behavior')]
    public ?string $prorationBehavior;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   phases?: ?array<SchedulePhase>,
     *   endBehavior?: ?value-of<UpdateSubscriptionScheduleRequestEndBehavior>,
     *   prorationBehavior?: ?value-of<UpdateSubscriptionScheduleRequestProrationBehavior>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->phases = $values['phases'] ?? null;
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->prorationBehavior = $values['prorationBehavior'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
