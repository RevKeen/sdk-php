<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * A financial movement in the unified transaction model. Every money movement — payments, refunds, voids, disputes — is recorded as a transaction linked to an invoice.
 */
class Transaction extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the transaction
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<TransactionObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var value-of<TransactionType> $type Transaction type. sale: original payment. refund: money returned. void: cancel before settlement. capture: capture a previous auth. dispute: chargeback. adjustment: manual correction.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<TransactionStatus> $status Transaction status. pending: processing. succeeded: completed. failed: declined or errored. voided: canceled.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $invoiceId Associated invoice ID
     */
    #[JsonProperty('invoice_id')]
    public string $invoiceId;

    /**
     * @var ?string $customerId Customer ID
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?string $parentTransactionId Parent transaction ID (required for refunds, voids, disputes, adjustments)
     */
    #[JsonProperty('parent_transaction_id')]
    public ?string $parentTransactionId;

    /**
     * @var string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var int $amount Transaction amount in minor units (cents)
     */
    #[JsonProperty('amount')]
    public int $amount;

    /**
     * @var ?int $amountRefunded Amount refunded in minor units
     */
    #[JsonProperty('amount_refunded')]
    public ?int $amountRefunded;

    /**
     * @var ?string $gateway Payment gateway (e.g., 'nmi')
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
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var DateTime $createdAt Creation timestamp (ISO 8601)
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt Last update timestamp (ISO 8601)
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<TransactionObject>,
     *   type: value-of<TransactionType>,
     *   status: value-of<TransactionStatus>,
     *   invoiceId: string,
     *   currency: string,
     *   amount: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   customerId?: ?string,
     *   parentTransactionId?: ?string,
     *   amountRefunded?: ?int,
     *   gateway?: ?string,
     *   gatewayTransactionId?: ?string,
     *   gatewayResponseCode?: ?string,
     *   gatewayResponseText?: ?string,
     *   paymentMethodType?: ?string,
     *   cardBrand?: ?string,
     *   cardLastFour?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->type = $values['type'];
        $this->status = $values['status'];
        $this->invoiceId = $values['invoiceId'];
        $this->customerId = $values['customerId'] ?? null;
        $this->parentTransactionId = $values['parentTransactionId'] ?? null;
        $this->currency = $values['currency'];
        $this->amount = $values['amount'];
        $this->amountRefunded = $values['amountRefunded'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->gatewayResponseCode = $values['gatewayResponseCode'] ?? null;
        $this->gatewayResponseText = $values['gatewayResponseText'] ?? null;
        $this->paymentMethodType = $values['paymentMethodType'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLastFour = $values['cardLastFour'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
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
