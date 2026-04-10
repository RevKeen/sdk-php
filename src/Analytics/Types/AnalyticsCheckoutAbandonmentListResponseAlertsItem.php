<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutAbandonmentListResponseAlertsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $checkoutSessionId
     */
    #[JsonProperty('checkoutSessionId')]
    public string $checkoutSessionId;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * @var ?string $customerEmail
     */
    #[JsonProperty('customerEmail')]
    public ?string $customerEmail;

    /**
     * @var string $severity
     */
    #[JsonProperty('severity')]
    public string $severity;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?float $cartValueCents
     */
    #[JsonProperty('cartValueCents')]
    public ?float $cartValueCents;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $lastStepReached
     */
    #[JsonProperty('lastStepReached')]
    public ?string $lastStepReached;

    /**
     * @var bool $enteredEmail
     */
    #[JsonProperty('enteredEmail')]
    public bool $enteredEmail;

    /**
     * @var bool $enteredPaymentInfo
     */
    #[JsonProperty('enteredPaymentInfo')]
    public bool $enteredPaymentInfo;

    /**
     * @var bool $paymentAttempted
     */
    #[JsonProperty('paymentAttempted')]
    public bool $paymentAttempted;

    /**
     * @var ?float $timeSpentSeconds
     */
    #[JsonProperty('timeSpentSeconds')]
    public ?float $timeSpentSeconds;

    /**
     * @var string $abandonedAt
     */
    #[JsonProperty('abandonedAt')]
    public string $abandonedAt;

    /**
     * @var string $detectedAt
     */
    #[JsonProperty('detectedAt')]
    public string $detectedAt;

    /**
     * @var bool $recoveryEmailSent
     */
    #[JsonProperty('recoveryEmailSent')]
    public bool $recoveryEmailSent;

    /**
     * @var bool $webhookNotified
     */
    #[JsonProperty('webhookNotified')]
    public bool $webhookNotified;

    /**
     * @param array{
     *   id: string,
     *   checkoutSessionId: string,
     *   severity: string,
     *   status: string,
     *   currency: string,
     *   enteredEmail: bool,
     *   enteredPaymentInfo: bool,
     *   paymentAttempted: bool,
     *   abandonedAt: string,
     *   detectedAt: string,
     *   recoveryEmailSent: bool,
     *   webhookNotified: bool,
     *   customerId?: ?string,
     *   customerEmail?: ?string,
     *   cartValueCents?: ?float,
     *   lastStepReached?: ?string,
     *   timeSpentSeconds?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->checkoutSessionId = $values['checkoutSessionId'];
        $this->customerId = $values['customerId'] ?? null;
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->severity = $values['severity'];
        $this->status = $values['status'];
        $this->cartValueCents = $values['cartValueCents'] ?? null;
        $this->currency = $values['currency'];
        $this->lastStepReached = $values['lastStepReached'] ?? null;
        $this->enteredEmail = $values['enteredEmail'];
        $this->enteredPaymentInfo = $values['enteredPaymentInfo'];
        $this->paymentAttempted = $values['paymentAttempted'];
        $this->timeSpentSeconds = $values['timeSpentSeconds'] ?? null;
        $this->abandonedAt = $values['abandonedAt'];
        $this->detectedAt = $values['detectedAt'];
        $this->recoveryEmailSent = $values['recoveryEmailSent'];
        $this->webhookNotified = $values['webhookNotified'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
