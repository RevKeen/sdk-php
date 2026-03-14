<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Subscriptions\Types\SubscriptionsChangePlanRequestProrationBehavior;
use DateTime;
use RevKeen\Core\Types\Date;

class SubscriptionsChangePlanRequest extends JsonSerializableType
{
    /**
     * @var string $newPlanId
     */
    #[JsonProperty('newPlanId')]
    public string $newPlanId;

    /**
     * @var ?value-of<SubscriptionsChangePlanRequestProrationBehavior> $prorationBehavior
     */
    #[JsonProperty('prorationBehavior')]
    public ?string $prorationBehavior;

    /**
     * @var ?DateTime $effectiveDate
     */
    #[JsonProperty('effectiveDate'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $effectiveDate;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   newPlanId: string,
     *   prorationBehavior?: ?value-of<SubscriptionsChangePlanRequestProrationBehavior>,
     *   effectiveDate?: ?DateTime,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newPlanId = $values['newPlanId'];
        $this->prorationBehavior = $values['prorationBehavior'] ?? null;
        $this->effectiveDate = $values['effectiveDate'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }
}
