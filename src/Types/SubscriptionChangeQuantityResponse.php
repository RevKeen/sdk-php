<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SubscriptionChangeQuantityResponse extends JsonSerializableType
{
    /**
     * @var SubscriptionChangeQuantityResponseSubscription $subscription
     */
    #[JsonProperty('subscription')]
    public SubscriptionChangeQuantityResponseSubscription $subscription;

    /**
     * @var ?array<string, mixed> $proration Proration details
     */
    #[JsonProperty('proration'), ArrayType(['string' => 'mixed'])]
    public ?array $proration;

    /**
     * @var ?float $previousQuantity
     */
    #[JsonProperty('previousQuantity')]
    public ?float $previousQuantity;

    /**
     * @var bool $invoiceCreated
     */
    #[JsonProperty('invoiceCreated')]
    public bool $invoiceCreated;

    /**
     * @param array{
     *   subscription: SubscriptionChangeQuantityResponseSubscription,
     *   invoiceCreated: bool,
     *   proration?: ?array<string, mixed>,
     *   previousQuantity?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscription = $values['subscription'];
        $this->proration = $values['proration'] ?? null;
        $this->previousQuantity = $values['previousQuantity'] ?? null;
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
