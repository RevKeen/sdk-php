<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UpdatePaymentIntentRequest extends JsonSerializableType
{
    /**
     * @var ?int $amount Amount in cents
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @var ?string $currency Three-letter ISO currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $paymentMethod Payment method ID
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var ?string $description Description for merchant reference
     */
    #[JsonProperty('description')]
    public ?string $description;

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
     * @param array{
     *   amount?: ?int,
     *   currency?: ?string,
     *   paymentMethod?: ?string,
     *   description?: ?string,
     *   statementDescriptor?: ?string,
     *   statementDescriptorSuffix?: ?string,
     *   receiptEmail?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amount = $values['amount'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->statementDescriptorSuffix = $values['statementDescriptorSuffix'] ?? null;
        $this->receiptEmail = $values['receiptEmail'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
