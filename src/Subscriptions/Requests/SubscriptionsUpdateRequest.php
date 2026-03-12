<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Subscriptions\Types\SubscriptionsUpdateRequestStatus;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SubscriptionsUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<SubscriptionsUpdateRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?int $amountMinor;

    /**
     * @var ?int $quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var ?string $nextBillingDate
     */
    #[JsonProperty('nextBillingDate')]
    public ?string $nextBillingDate;

    /**
     * @var ?int $billingAnchorDay
     */
    #[JsonProperty('billingAnchorDay')]
    public ?int $billingAnchorDay;

    /**
     * @var ?bool $pauseAtPeriodEnd
     */
    #[JsonProperty('pauseAtPeriodEnd')]
    public ?bool $pauseAtPeriodEnd;

    /**
     * @var ?bool $cancelAtPeriodEnd
     */
    #[JsonProperty('cancelAtPeriodEnd')]
    public ?bool $cancelAtPeriodEnd;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   status?: ?value-of<SubscriptionsUpdateRequestStatus>,
     *   amountMinor?: ?int,
     *   quantity?: ?int,
     *   nextBillingDate?: ?string,
     *   billingAnchorDay?: ?int,
     *   pauseAtPeriodEnd?: ?bool,
     *   cancelAtPeriodEnd?: ?bool,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->nextBillingDate = $values['nextBillingDate'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->pauseAtPeriodEnd = $values['pauseAtPeriodEnd'] ?? null;
        $this->cancelAtPeriodEnd = $values['cancelAtPeriodEnd'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
