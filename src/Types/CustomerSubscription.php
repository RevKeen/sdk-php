<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerSubscription extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customer_id')]
    public string $customerId;

    /**
     * @var ?string $priceId
     */
    #[JsonProperty('price_id')]
    public ?string $priceId;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $currentPeriodStart
     */
    #[JsonProperty('current_period_start')]
    public ?string $currentPeriodStart;

    /**
     * @var ?string $currentPeriodEnd
     */
    #[JsonProperty('current_period_end')]
    public ?string $currentPeriodEnd;

    /**
     * @var bool $cancelAtPeriodEnd
     */
    #[JsonProperty('cancel_at_period_end')]
    public bool $cancelAtPeriodEnd;

    /**
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    public ?string $canceledAt;

    /**
     * @var ?string $trialEnd
     */
    #[JsonProperty('trial_end')]
    public ?string $trialEnd;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   customerId: string,
     *   status: string,
     *   cancelAtPeriodEnd: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   priceId?: ?string,
     *   currentPeriodStart?: ?string,
     *   currentPeriodEnd?: ?string,
     *   canceledAt?: ?string,
     *   trialEnd?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'];
        $this->priceId = $values['priceId'] ?? null;
        $this->status = $values['status'];
        $this->currentPeriodStart = $values['currentPeriodStart'] ?? null;
        $this->currentPeriodEnd = $values['currentPeriodEnd'] ?? null;
        $this->cancelAtPeriodEnd = $values['cancelAtPeriodEnd'];
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->trialEnd = $values['trialEnd'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
