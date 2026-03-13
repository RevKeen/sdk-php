<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class PaymentIntent extends JsonSerializableType
{
    /**
     * @var string $id Public payment intent ID (pi_xxx)
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PaymentIntentObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var int $amount Amount in cents
     */
    #[JsonProperty('amount')]
    public int $amount;

    /**
     * @var int $amountCapturable Amount that can be captured (for manual capture)
     */
    #[JsonProperty('amount_capturable')]
    public int $amountCapturable;

    /**
     * @var int $amountReceived Amount actually received
     */
    #[JsonProperty('amount_received')]
    public int $amountReceived;

    /**
     * @var string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $customer Customer ID
     */
    #[JsonProperty('customer')]
    public string $customer;

    /**
     * @var ?string $description Description for merchant reference
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?PaymentIntentLastPaymentError $lastPaymentError Last error from payment attempt
     */
    #[JsonProperty('last_payment_error')]
    public ?PaymentIntentLastPaymentError $lastPaymentError;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?PaymentIntentNextAction $nextAction Action required from customer (3DS, etc.)
     */
    #[JsonProperty('next_action')]
    public ?PaymentIntentNextAction $nextAction;

    /**
     * @var ?string $paymentMethod Payment method ID
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var ?string $receiptEmail Email for receipt
     */
    #[JsonProperty('receipt_email')]
    public ?string $receiptEmail;

    /**
     * @var ?string $statementDescriptor Statement descriptor
     */
    #[JsonProperty('statement_descriptor')]
    public ?string $statementDescriptor;

    /**
     * @var ?string $statementDescriptorSuffix Statement descriptor suffix
     */
    #[JsonProperty('statement_descriptor_suffix')]
    public ?string $statementDescriptorSuffix;

    /**
     * @var value-of<PaymentIntentStatus> $status Payment intent status. requires_payment_method: Needs payment method. requires_confirmation: Ready to confirm. requires_action: Requires customer action (3DS). processing: Being processed. succeeded: Payment complete. canceled: Canceled.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<PaymentIntentCaptureMethod> $captureMethod Capture method. automatic: Capture immediately on confirmation. manual: Authorize then capture separately.
     */
    #[JsonProperty('capture_method')]
    public string $captureMethod;

    /**
     * @var string $clientSecret Client secret for frontend confirmation
     */
    #[JsonProperty('client_secret')]
    public string $clientSecret;

    /**
     * @var ?DateTime $canceledAt When the intent was canceled
     */
    #[JsonProperty('canceled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var ?value-of<PaymentIntentCancellationReason> $cancellationReason Why the intent was canceled
     */
    #[JsonProperty('cancellation_reason')]
    public ?string $cancellationReason;

    /**
     * @var int $created Unix timestamp of creation
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var bool $livemode Whether in live mode
     */
    #[JsonProperty('livemode')]
    public bool $livemode;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<PaymentIntentObject>,
     *   amount: int,
     *   amountCapturable: int,
     *   amountReceived: int,
     *   currency: string,
     *   customer: string,
     *   status: value-of<PaymentIntentStatus>,
     *   captureMethod: value-of<PaymentIntentCaptureMethod>,
     *   clientSecret: string,
     *   created: int,
     *   livemode: bool,
     *   description?: ?string,
     *   lastPaymentError?: ?PaymentIntentLastPaymentError,
     *   metadata?: ?array<string, mixed>,
     *   nextAction?: ?PaymentIntentNextAction,
     *   paymentMethod?: ?string,
     *   receiptEmail?: ?string,
     *   statementDescriptor?: ?string,
     *   statementDescriptorSuffix?: ?string,
     *   canceledAt?: ?DateTime,
     *   cancellationReason?: ?value-of<PaymentIntentCancellationReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->amount = $values['amount'];
        $this->amountCapturable = $values['amountCapturable'];
        $this->amountReceived = $values['amountReceived'];
        $this->currency = $values['currency'];
        $this->customer = $values['customer'];
        $this->description = $values['description'] ?? null;
        $this->lastPaymentError = $values['lastPaymentError'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->nextAction = $values['nextAction'] ?? null;
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->receiptEmail = $values['receiptEmail'] ?? null;
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->statementDescriptorSuffix = $values['statementDescriptorSuffix'] ?? null;
        $this->status = $values['status'];
        $this->captureMethod = $values['captureMethod'];
        $this->clientSecret = $values['clientSecret'];
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->cancellationReason = $values['cancellationReason'] ?? null;
        $this->created = $values['created'];
        $this->livemode = $values['livemode'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
