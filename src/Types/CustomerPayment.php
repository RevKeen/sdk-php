<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A payment transaction belonging to a specific customer, with amount, status, and gateway details.
 */
class CustomerPayment extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public int $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $paymentMethodType
     */
    #[JsonProperty('payment_method_type')]
    public ?string $paymentMethodType;

    /**
     * @var ?string $gatewayTransactionId
     */
    #[JsonProperty('gateway_transaction_id')]
    public ?string $gatewayTransactionId;

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
     *   amountMinor: int,
     *   currency: string,
     *   status: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   customerId?: ?string,
     *   paymentMethodType?: ?string,
     *   gatewayTransactionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->paymentMethodType = $values['paymentMethodType'] ?? null;
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
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
