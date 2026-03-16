<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class ChargeCreateResponseData extends JsonSerializableType
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
     * @var ?string $invoiceId
     */
    #[JsonProperty('invoiceId')]
    public ?string $invoiceId;

    /**
     * @var ?string $paymentMethodId
     */
    #[JsonProperty('paymentMethodId')]
    public ?string $paymentMethodId;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public int $amountMinor;

    /**
     * @var int $amountCapturedMinor
     */
    #[JsonProperty('amountCapturedMinor')]
    public int $amountCapturedMinor;

    /**
     * @var int $amountRefundedMinor
     */
    #[JsonProperty('amountRefundedMinor')]
    public int $amountRefundedMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var value-of<ChargeCreateResponseDataStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?string $statementDescriptor
     */
    #[JsonProperty('statementDescriptor')]
    public ?string $statementDescriptor;

    /**
     * @var ?string $failureCode
     */
    #[JsonProperty('failureCode')]
    public ?string $failureCode;

    /**
     * @var ?string $failureMessage
     */
    #[JsonProperty('failureMessage')]
    public ?string $failureMessage;

    /**
     * @var ?string $gatewayTransactionId
     */
    #[JsonProperty('gatewayTransactionId')]
    public ?string $gatewayTransactionId;

    /**
     * @var ?string $receiptUrl
     */
    #[JsonProperty('receiptUrl')]
    public ?string $receiptUrl;

    /**
     * @var bool $captured
     */
    #[JsonProperty('captured')]
    public bool $captured;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

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
     * @param array{
     *   id: string,
     *   merchantId: string,
     *   customerId: string,
     *   amountMinor: int,
     *   amountCapturedMinor: int,
     *   amountRefundedMinor: int,
     *   currency: string,
     *   status: value-of<ChargeCreateResponseDataStatus>,
     *   description: string,
     *   captured: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   invoiceId?: ?string,
     *   paymentMethodId?: ?string,
     *   statementDescriptor?: ?string,
     *   failureCode?: ?string,
     *   failureMessage?: ?string,
     *   gatewayTransactionId?: ?string,
     *   receiptUrl?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->customerId = $values['customerId'];
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->amountCapturedMinor = $values['amountCapturedMinor'];
        $this->amountRefundedMinor = $values['amountRefundedMinor'];
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->description = $values['description'];
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->failureCode = $values['failureCode'] ?? null;
        $this->failureMessage = $values['failureMessage'] ?? null;
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->receiptUrl = $values['receiptUrl'] ?? null;
        $this->captured = $values['captured'];
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
