<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class PaymentAttempt extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the payment attempt
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $publicId External reference ID (payatt_xxx format). Used as order_id in gateway requests.
     */
    #[JsonProperty('public_id')]
    public ?string $publicId;

    /**
     * @var ?string $gatewayOrderId The exact order_id sent to the gateway (NMI). Format: payatt_<public_id>. Primary correlation key for webhook mapping.
     */
    #[JsonProperty('gateway_order_id')]
    public ?string $gatewayOrderId;

    /**
     * @var ?string $gatewayTransactionId Transaction ID returned by the gateway (NMI's transaction reference).
     */
    #[JsonProperty('gateway_transaction_id')]
    public ?string $gatewayTransactionId;

    /**
     * @var ?string $transactionId Legacy transaction reference (deprecated - use gateway_transaction_id)
     */
    #[JsonProperty('transaction_id')]
    public ?string $transactionId;

    /**
     * @var ?string $paymentId Logical payment (PaymentIntent) this attempt belongs to
     */
    #[JsonProperty('payment_id')]
    public ?string $paymentId;

    /**
     * @var ?string $invoiceId Associated invoice ID
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $subscriptionId Associated subscription ID
     */
    #[JsonProperty('subscription_id')]
    public ?string $subscriptionId;

    /**
     * @var ?string $checkoutSessionId Associated checkout session ID
     */
    #[JsonProperty('checkout_session_id')]
    public ?string $checkoutSessionId;

    /**
     * @var ?string $billingRunId Billing run ID for batch reconciliation
     */
    #[JsonProperty('billing_run_id')]
    public ?string $billingRunId;

    /**
     * @var string $gateway Payment gateway (e.g., 'nmi', 'stripe')
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var string $gatewayCode Raw gateway response code
     */
    #[JsonProperty('gateway_code')]
    public string $gatewayCode;

    /**
     * @var string $gatewayMessage Raw gateway response message
     */
    #[JsonProperty('gateway_message')]
    public string $gatewayMessage;

    /**
     * @var value-of<PaymentAttemptCategory> $category Normalized error category for the payment attempt
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var value-of<PaymentAttemptSeverity> $severity Severity level for logging/monitoring
     */
    #[JsonProperty('severity')]
    public string $severity;

    /**
     * @var value-of<PaymentAttemptRetryability> $retryability Retry behavior recommendation. retry_now: Safe to retry immediately. retry_later: Retry after delay. do_not_retry: Hard decline, don't retry.
     */
    #[JsonProperty('retryability')]
    public string $retryability;

    /**
     * @var value-of<PaymentAttemptCustomerAction> $customerAction Recommended action for the customer
     */
    #[JsonProperty('customer_action')]
    public string $customerAction;

    /**
     * @var value-of<PaymentAttemptMerchantAction> $merchantAction Recommended action for the merchant
     */
    #[JsonProperty('merchant_action')]
    public string $merchantAction;

    /**
     * @var value-of<PaymentAttemptSubscriptionDirective> $subscriptionDirective Directive for subscription handling after decline
     */
    #[JsonProperty('subscription_directive')]
    public string $subscriptionDirective;

    /**
     * @var string $safeCustomerMessageKey Template key for customer-facing message
     */
    #[JsonProperty('safe_customer_message_key')]
    public string $safeCustomerMessageKey;

    /**
     * @var ?value-of<PaymentAttemptDeclineType> $declineType Decline classification. soft: May succeed on retry. hard: Will not succeed on retry.
     */
    #[JsonProperty('decline_type')]
    public ?string $declineType;

    /**
     * @var value-of<PaymentAttemptAttemptStatus> $attemptStatus Final outcome status of the attempt
     */
    #[JsonProperty('attempt_status')]
    public string $attemptStatus;

    /**
     * @var ?string $avsCode Address Verification System response code
     */
    #[JsonProperty('avs_code')]
    public ?string $avsCode;

    /**
     * @var ?string $cvvCode CVV verification response code
     */
    #[JsonProperty('cvv_code')]
    public ?string $cvvCode;

    /**
     * @var ?string $issuerCode Issuer-specific response code
     */
    #[JsonProperty('issuer_code')]
    public ?string $issuerCode;

    /**
     * @var ?int $amountCents Payment amount in cents
     */
    #[JsonProperty('amount_cents')]
    public ?int $amountCents;

    /**
     * @var ?string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $paymentMethodLast4 Last 4 digits of card
     */
    #[JsonProperty('payment_method_last4')]
    public ?string $paymentMethodLast4;

    /**
     * @var ?string $paymentMethodBrand Card brand (visa, mastercard, etc.)
     */
    #[JsonProperty('payment_method_brand')]
    public ?string $paymentMethodBrand;

    /**
     * @var int $attemptNumber Attempt sequence number (1 = first attempt)
     */
    #[JsonProperty('attempt_number')]
    public int $attemptNumber;

    /**
     * @var int $retryAttemptNumber Legacy retry attempt number
     */
    #[JsonProperty('retry_attempt_number')]
    public int $retryAttemptNumber;

    /**
     * @var ?int $maxRetryAttempts Maximum retry attempts allowed
     */
    #[JsonProperty('max_retry_attempts')]
    public ?int $maxRetryAttempts;

    /**
     * @var ?DateTime $nextRetryAt Next scheduled retry timestamp
     */
    #[JsonProperty('next_retry_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextRetryAt;

    /**
     * @var bool $isScheduledRetry Whether this was a scheduled retry
     */
    #[JsonProperty('is_scheduled_retry')]
    public bool $isScheduledRetry;

    /**
     * @var bool $isManualRetry Whether this was a manual retry
     */
    #[JsonProperty('is_manual_retry')]
    public bool $isManualRetry;

    /**
     * @var DateTime $createdAt When the attempt was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the attempt was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   gateway: string,
     *   gatewayCode: string,
     *   gatewayMessage: string,
     *   category: value-of<PaymentAttemptCategory>,
     *   severity: value-of<PaymentAttemptSeverity>,
     *   retryability: value-of<PaymentAttemptRetryability>,
     *   customerAction: value-of<PaymentAttemptCustomerAction>,
     *   merchantAction: value-of<PaymentAttemptMerchantAction>,
     *   subscriptionDirective: value-of<PaymentAttemptSubscriptionDirective>,
     *   safeCustomerMessageKey: string,
     *   attemptStatus: value-of<PaymentAttemptAttemptStatus>,
     *   attemptNumber: int,
     *   retryAttemptNumber: int,
     *   isScheduledRetry: bool,
     *   isManualRetry: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   publicId?: ?string,
     *   gatewayOrderId?: ?string,
     *   gatewayTransactionId?: ?string,
     *   transactionId?: ?string,
     *   paymentId?: ?string,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     *   checkoutSessionId?: ?string,
     *   billingRunId?: ?string,
     *   declineType?: ?value-of<PaymentAttemptDeclineType>,
     *   avsCode?: ?string,
     *   cvvCode?: ?string,
     *   issuerCode?: ?string,
     *   amountCents?: ?int,
     *   currency?: ?string,
     *   paymentMethodLast4?: ?string,
     *   paymentMethodBrand?: ?string,
     *   maxRetryAttempts?: ?int,
     *   nextRetryAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'] ?? null;
        $this->gatewayOrderId = $values['gatewayOrderId'] ?? null;
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->transactionId = $values['transactionId'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->checkoutSessionId = $values['checkoutSessionId'] ?? null;
        $this->billingRunId = $values['billingRunId'] ?? null;
        $this->gateway = $values['gateway'];
        $this->gatewayCode = $values['gatewayCode'];
        $this->gatewayMessage = $values['gatewayMessage'];
        $this->category = $values['category'];
        $this->severity = $values['severity'];
        $this->retryability = $values['retryability'];
        $this->customerAction = $values['customerAction'];
        $this->merchantAction = $values['merchantAction'];
        $this->subscriptionDirective = $values['subscriptionDirective'];
        $this->safeCustomerMessageKey = $values['safeCustomerMessageKey'];
        $this->declineType = $values['declineType'] ?? null;
        $this->attemptStatus = $values['attemptStatus'];
        $this->avsCode = $values['avsCode'] ?? null;
        $this->cvvCode = $values['cvvCode'] ?? null;
        $this->issuerCode = $values['issuerCode'] ?? null;
        $this->amountCents = $values['amountCents'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->paymentMethodLast4 = $values['paymentMethodLast4'] ?? null;
        $this->paymentMethodBrand = $values['paymentMethodBrand'] ?? null;
        $this->attemptNumber = $values['attemptNumber'];
        $this->retryAttemptNumber = $values['retryAttemptNumber'];
        $this->maxRetryAttempts = $values['maxRetryAttempts'] ?? null;
        $this->nextRetryAt = $values['nextRetryAt'] ?? null;
        $this->isScheduledRetry = $values['isScheduledRetry'];
        $this->isManualRetry = $values['isManualRetry'];
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
