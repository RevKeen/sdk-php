<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\PaymentIntents\Types\CreatePaymentIntentRequestCaptureMethod;
use RevKeen\Core\Types\ArrayType;

class CreatePaymentIntentRequest extends JsonSerializableType
{
    /**
     * @var int $amount Amount in cents. Must be greater than 0.
     */
    #[JsonProperty('amount')]
    public int $amount;

    /**
     * @var ?string $currency Three-letter ISO currency code. Defaults to USD.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var string $customer Customer ID to charge
     */
    #[JsonProperty('customer')]
    public string $customer;

    /**
     * @var ?string $paymentMethod Payment method ID. If not provided, status will be requires_payment_method.
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var ?value-of<CreatePaymentIntentRequestCaptureMethod> $captureMethod Capture method. Defaults to automatic.
     */
    #[JsonProperty('capture_method')]
    public ?string $captureMethod;

    /**
     * @var ?string $description Description for merchant reference
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $statementDescriptor Statement descriptor shown on customer's statement
     */
    #[JsonProperty('statement_descriptor')]
    public ?string $statementDescriptor;

    /**
     * @var ?string $statementDescriptorSuffix Statement descriptor suffix
     */
    #[JsonProperty('statement_descriptor_suffix')]
    public ?string $statementDescriptorSuffix;

    /**
     * @var ?string $receiptEmail Email to send receipt to
     */
    #[JsonProperty('receipt_email')]
    public ?string $receiptEmail;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?string $gatewayMerchantId Specific gateway merchant ID for multi-MID setups (NMI)
     */
    #[JsonProperty('gateway_merchant_id')]
    public ?string $gatewayMerchantId;

    /**
     * @param array{
     *   amount: int,
     *   customer: string,
     *   currency?: ?string,
     *   paymentMethod?: ?string,
     *   captureMethod?: ?value-of<CreatePaymentIntentRequestCaptureMethod>,
     *   description?: ?string,
     *   statementDescriptor?: ?string,
     *   statementDescriptorSuffix?: ?string,
     *   receiptEmail?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   gatewayMerchantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'];
        $this->currency = $values['currency'] ?? null;
        $this->customer = $values['customer'];
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->captureMethod = $values['captureMethod'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->statementDescriptorSuffix = $values['statementDescriptorSuffix'] ?? null;
        $this->receiptEmail = $values['receiptEmail'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->gatewayMerchantId = $values['gatewayMerchantId'] ?? null;
    }
}
