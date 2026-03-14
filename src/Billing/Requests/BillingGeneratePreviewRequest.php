<?php

namespace RevKeen\Billing\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Billing\Types\BillingGeneratePreviewRequestInterval;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Billing\Types\BillingGeneratePreviewRequestBillingAnchorRule;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Billing\Types\BillingGeneratePreviewRequestFirstChargeBehavior;
use RevKeen\Billing\Types\BillingGeneratePreviewRequestEndBehavior;

class BillingGeneratePreviewRequest extends JsonSerializableType
{
    /**
     * @var value-of<BillingGeneratePreviewRequestInterval> $interval
     */
    #[JsonProperty('interval')]
    public string $interval;

    /**
     * @var ?int $intervalCount
     */
    #[JsonProperty('intervalCount')]
    public ?int $intervalCount;

    /**
     * @var ?value-of<BillingGeneratePreviewRequestBillingAnchorRule> $billingAnchorRule
     */
    #[JsonProperty('billingAnchorRule')]
    public ?string $billingAnchorRule;

    /**
     * @var ?int $billingAnchorDay
     */
    #[JsonProperty('billingAnchorDay')]
    public ?int $billingAnchorDay;

    /**
     * @var ?DateTime $startsAt
     */
    #[JsonProperty('startsAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startsAt;

    /**
     * @var ?value-of<BillingGeneratePreviewRequestFirstChargeBehavior> $firstChargeBehavior
     */
    #[JsonProperty('firstChargeBehavior')]
    public ?string $firstChargeBehavior;

    /**
     * @var ?int $trialDays
     */
    #[JsonProperty('trialDays')]
    public ?int $trialDays;

    /**
     * @var ?value-of<BillingGeneratePreviewRequestEndBehavior> $endBehavior
     */
    #[JsonProperty('endBehavior')]
    public ?string $endBehavior;

    /**
     * @var ?int $maxPayments
     */
    #[JsonProperty('maxPayments')]
    public ?int $maxPayments;

    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?int $amountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?int $previewCount
     */
    #[JsonProperty('previewCount')]
    public ?int $previewCount;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   interval: value-of<BillingGeneratePreviewRequestInterval>,
     *   intervalCount?: ?int,
     *   billingAnchorRule?: ?value-of<BillingGeneratePreviewRequestBillingAnchorRule>,
     *   billingAnchorDay?: ?int,
     *   startsAt?: ?DateTime,
     *   firstChargeBehavior?: ?value-of<BillingGeneratePreviewRequestFirstChargeBehavior>,
     *   trialDays?: ?int,
     *   endBehavior?: ?value-of<BillingGeneratePreviewRequestEndBehavior>,
     *   maxPayments?: ?int,
     *   amountMinor?: ?int,
     *   currency?: ?string,
     *   previewCount?: ?int,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->interval = $values['interval'];
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->billingAnchorRule = $values['billingAnchorRule'] ?? null;
        $this->billingAnchorDay = $values['billingAnchorDay'] ?? null;
        $this->startsAt = $values['startsAt'] ?? null;
        $this->firstChargeBehavior = $values['firstChargeBehavior'] ?? null;
        $this->trialDays = $values['trialDays'] ?? null;
        $this->endBehavior = $values['endBehavior'] ?? null;
        $this->maxPayments = $values['maxPayments'] ?? null;
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->previewCount = $values['previewCount'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }
}
