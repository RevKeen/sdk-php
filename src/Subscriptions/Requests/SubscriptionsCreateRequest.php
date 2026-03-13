<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Subscriptions\Types\SubscriptionsCreateRequestBillingEndStrategy;
use RevKeen\Subscriptions\Types\SubscriptionsCreateRequestProrationMode;
use RevKeen\Core\Types\ArrayType;

class SubscriptionsCreateRequest extends JsonSerializableType
{
    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var ?string $businessId
     */
    #[JsonProperty('businessId')]
    public ?string $businessId;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('productId')]
    public ?string $productId;

    /**
     * @var ?string $planId
     */
    #[JsonProperty('planId')]
    public ?string $planId;

    /**
     * @var ?string $priceId
     */
    #[JsonProperty('priceId')]
    public ?string $priceId;

    /**
     * @var ?string $paymentMethodId
     */
    #[JsonProperty('paymentMethodId')]
    public ?string $paymentMethodId;

    /**
     * @var ?string $startDate
     */
    #[JsonProperty('startDate')]
    public ?string $startDate;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?int $quantity
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @var ?DateTime $trialEnd
     */
    #[JsonProperty('trialEnd'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $trialEnd;

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
     * @var ?DateTime $billingStartsOn
     */
    #[JsonProperty('billingStartsOn'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $billingStartsOn;

    /**
     * @var ?value-of<SubscriptionsCreateRequestBillingEndStrategy> $billingEndStrategy
     */
    #[JsonProperty('billingEndStrategy')]
    public ?string $billingEndStrategy;

    /**
     * @var ?DateTime $billingEndsOn
     */
    #[JsonProperty('billingEndsOn'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $billingEndsOn;

    /**
     * @var ?int $billingMaxCycles
     */
    #[JsonProperty('billingMaxCycles')]
    public ?int $billingMaxCycles;

    /**
     * @var ?value-of<SubscriptionsCreateRequestProrationMode> $prorationMode
     */
    #[JsonProperty('prorationMode')]
    public ?string $prorationMode;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   customerId: string,
     *   businessId?: ?string,
     *   productId?: ?string,
     *   planId?: ?string,
     *   priceId?: ?string,
     *   paymentMethodId?: ?string,
     *   startDate?: ?string,
     *   currency?: ?string,
     *   quantity?: ?int,
     *   trialEnd?: ?DateTime,
     *   billingAnchorDay?: ?int,
     *   pauseAtPeriodEnd?: ?bool,
     *   cancelAtPeriodEnd?: ?bool,
     *   billingStartsOn?: ?DateTime,
     *   billingEndStrategy?: ?value-of<SubscriptionsCreateRequestBillingEndStrategy>,
     *   billingEndsOn?: ?DateTime,
     *   billingMaxCycles?: ?int,
     *   prorationMode?: ?value-of<SubscriptionsCreateRequestProrationMode>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->businessId = $values['businessId'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->planId = $values['planId'] ?? null;
        $this->priceId = $values['priceId'] ?? null;
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->trialEnd = $values['trialEnd'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->pauseAtPeriodEnd = $values['pauseAtPeriodEnd'] ?? null;
        $this->cancelAtPeriodEnd = $values['cancelAtPeriodEnd'] ?? null;
        $this->billingStartsOn = $values['billingStartsOn'] ?? null;
        $this->billingEndStrategy = $values['billingEndStrategy'] ?? null;
        $this->billingEndsOn = $values['billingEndsOn'] ?? null;
        $this->billingMaxCycles = $values['billingMaxCycles'] ?? null;
        $this->prorationMode = $values['prorationMode'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
