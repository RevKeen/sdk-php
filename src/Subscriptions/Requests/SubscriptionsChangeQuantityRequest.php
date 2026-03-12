<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Subscriptions\Types\SubscriptionsChangeQuantityRequestProrationBehavior;
use DateTime;
use RevKeen\Core\Types\Date;

class SubscriptionsChangeQuantityRequest extends JsonSerializableType
{
    /**
     * @var int $newQuantity
     */
    #[JsonProperty('newQuantity')]
    public int $newQuantity;

    /**
     * @var ?value-of<SubscriptionsChangeQuantityRequestProrationBehavior> $prorationBehavior
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
     *   newQuantity: int,
     *   prorationBehavior?: ?value-of<SubscriptionsChangeQuantityRequestProrationBehavior>,
     *   effectiveDate?: ?DateTime,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->newQuantity = $values['newQuantity'];
        $this->prorationBehavior = $values['prorationBehavior'] ?? null;
        $this->effectiveDate = $values['effectiveDate'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }
}
