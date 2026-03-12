<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class Payment extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the payment
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PaymentObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var ?string $invoiceId Associated invoice ID
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $customerId Customer ID
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var value-of<PaymentStatus> $status Payment status. pending: Processing. authorized: Funds reserved. captured/succeeded: Funds collected. failed: Payment failed. voided: Canceled before capture. refunded/partially_refunded: Returned to customer.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $amount Payment amount in cents
     */
    #[JsonProperty('amount')]
    public int $amount;

    /**
     * @var ?int $amountCaptured Amount captured in cents (for auth-capture flow)
     */
    #[JsonProperty('amount_captured')]
    public ?int $amountCaptured;

    /**
     * @var ?int $amountRefunded Amount refunded in cents
     */
    #[JsonProperty('amount_refunded')]
    public ?int $amountRefunded;

    /**
     * @var ?string $gateway Payment gateway (e.g., 'nmi', 'stripe')
     */
    #[JsonProperty('gateway')]
    public ?string $gateway;

    /**
     * @var ?string $gatewayTransactionId Gateway's transaction reference
     */
    #[JsonProperty('gateway_transaction_id')]
    public ?string $gatewayTransactionId;

    /**
     * @var ?string $gatewayResponseCode Gateway response code
     */
    #[JsonProperty('gateway_response_code')]
    public ?string $gatewayResponseCode;

    /**
     * @var ?string $gatewayResponseText Gateway response message
     */
    #[JsonProperty('gateway_response_text')]
    public ?string $gatewayResponseText;

    /**
     * @var ?string $paymentMethodType Payment method type (card, ach, wallet)
     */
    #[JsonProperty('payment_method_type')]
    public ?string $paymentMethodType;

    /**
     * @var ?string $cardBrand Card brand (visa, mastercard, etc.)
     */
    #[JsonProperty('card_brand')]
    public ?string $cardBrand;

    /**
     * @var ?string $cardLastFour Last 4 digits of card
     */
    #[JsonProperty('card_last_four')]
    public ?string $cardLastFour;

    /**
     * @var ?value-of<PaymentPaymentChannel> $paymentChannel Payment channel. card_present: terminal/POS payment. card_not_present: online or recurring payment. bank_transfer: ACH/direct debit. manual: manually recorded.
     */
    #[JsonProperty('payment_channel')]
    public ?string $paymentChannel;

    /**
     * @var ?value-of<PaymentEntryMode> $entryMode Card entry mode for card-present (terminal) payments. null for online payments.
     */
    #[JsonProperty('entry_mode')]
    public ?string $entryMode;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?DateTime $authorizedAt
     */
    #[JsonProperty('authorized_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $authorizedAt;

    /**
     * @var ?DateTime $capturedAt
     */
    #[JsonProperty('captured_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $capturedAt;

    /**
     * @var ?DateTime $voidedAt
     */
    #[JsonProperty('voided_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $voidedAt;

    /**
     * @var ?DateTime $refundedAt
     */
    #[JsonProperty('refunded_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $refundedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<PaymentObject>,
     *   status: value-of<PaymentStatus>,
     *   currency: string,
     *   amount: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   invoiceId?: ?string,
     *   customerId?: ?string,
     *   amountCaptured?: ?int,
     *   amountRefunded?: ?int,
     *   gateway?: ?string,
     *   gatewayTransactionId?: ?string,
     *   gatewayResponseCode?: ?string,
     *   gatewayResponseText?: ?string,
     *   paymentMethodType?: ?string,
     *   cardBrand?: ?string,
     *   cardLastFour?: ?string,
     *   paymentChannel?: ?value-of<PaymentPaymentChannel>,
     *   entryMode?: ?value-of<PaymentEntryMode>,
     *   metadata?: ?array<string, mixed>,
     *   authorizedAt?: ?DateTime,
     *   capturedAt?: ?DateTime,
     *   voidedAt?: ?DateTime,
     *   refundedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->status = $values['status'];
        $this->currency = $values['currency'];
        $this->amount = $values['amount'];
        $this->amountCaptured = $values['amountCaptured'] ?? null;
        $this->amountRefunded = $values['amountRefunded'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->gatewayResponseCode = $values['gatewayResponseCode'] ?? null;
        $this->gatewayResponseText = $values['gatewayResponseText'] ?? null;
        $this->paymentMethodType = $values['paymentMethodType'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLastFour = $values['cardLastFour'] ?? null;
        $this->paymentChannel = $values['paymentChannel'] ?? null;
        $this->entryMode = $values['entryMode'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->authorizedAt = $values['authorizedAt'] ?? null;
        $this->capturedAt = $values['capturedAt'] ?? null;
        $this->voidedAt = $values['voidedAt'] ?? null;
        $this->refundedAt = $values['refundedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
