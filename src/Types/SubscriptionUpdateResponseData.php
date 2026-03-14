<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class SubscriptionUpdateResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('productId')]
    public ?string $productId;

    /**
     * @var ?string $priceId
     */
    #[JsonProperty('priceId')]
    public ?string $priceId;

    /**
     * @var ?string $planId
     */
    #[JsonProperty('planId')]
    public ?string $planId;

    /**
     * @var value-of<SubscriptionUpdateResponseDataStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public int $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var value-of<SubscriptionUpdateResponseDataBillingInterval> $billingInterval
     */
    #[JsonProperty('billingInterval')]
    public string $billingInterval;

    /**
     * @var DateTime $currentPeriodStart
     */
    #[JsonProperty('currentPeriodStart'), Date(Date::TYPE_DATETIME)]
    public DateTime $currentPeriodStart;

    /**
     * @var DateTime $currentPeriodEnd
     */
    #[JsonProperty('currentPeriodEnd'), Date(Date::TYPE_DATETIME)]
    public DateTime $currentPeriodEnd;

    /**
     * @var ?DateTime $trialEnd
     */
    #[JsonProperty('trialEnd'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $trialEnd;

    /**
     * @var ?DateTime $canceledAt
     */
    #[JsonProperty('canceledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?SubscriptionUpdateResponseDataDunning $dunning
     */
    #[JsonProperty('dunning')]
    public ?SubscriptionUpdateResponseDataDunning $dunning;

    /**
     * @param array{
     *   id: string,
     *   merchantId: string,
     *   customerId: string,
     *   status: value-of<SubscriptionUpdateResponseDataStatus>,
     *   quantity: int,
     *   amountMinor: int,
     *   currency: string,
     *   billingInterval: value-of<SubscriptionUpdateResponseDataBillingInterval>,
     *   currentPeriodStart: DateTime,
     *   currentPeriodEnd: DateTime,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   productId?: ?string,
     *   priceId?: ?string,
     *   planId?: ?string,
     *   trialEnd?: ?DateTime,
     *   canceledAt?: ?DateTime,
     *   dunning?: ?SubscriptionUpdateResponseDataDunning,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->customerId = $values['customerId'];
        $this->productId = $values['productId'] ?? null;
        $this->priceId = $values['priceId'] ?? null;
        $this->planId = $values['planId'] ?? null;
        $this->status = $values['status'];
        $this->quantity = $values['quantity'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->billingInterval = $values['billingInterval'];
        $this->currentPeriodStart = $values['currentPeriodStart'];
        $this->currentPeriodEnd = $values['currentPeriodEnd'];
        $this->trialEnd = $values['trialEnd'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->dunning = $values['dunning'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
