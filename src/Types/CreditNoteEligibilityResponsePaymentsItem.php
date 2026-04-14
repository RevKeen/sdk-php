<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CreditNoteEligibilityResponsePaymentsItem extends JsonSerializableType
{
    /**
     * @var string $transactionId
     */
    #[JsonProperty('transaction_id')]
    public string $transactionId;

    /**
     * @var string $gateway
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var ?string $paymentMethod
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var float $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var float $amountRefundedMinor
     */
    #[JsonProperty('amount_refunded_minor')]
    public float $amountRefundedMinor;

    /**
     * @var float $amountAvailableMinor
     */
    #[JsonProperty('amount_available_minor')]
    public float $amountAvailableMinor;

    /**
     * @var ?string $cardBrand
     */
    #[JsonProperty('card_brand')]
    public ?string $cardBrand;

    /**
     * @var ?string $cardLast4
     */
    #[JsonProperty('card_last4')]
    public ?string $cardLast4;

    /**
     * @var ?string $terminalSerial
     */
    #[JsonProperty('terminal_serial')]
    public ?string $terminalSerial;

    /**
     * @var array<string> $availableOperations
     */
    #[JsonProperty('available_operations'), ArrayType(['string'])]
    public array $availableOperations;

    /**
     * @var CreditNoteEligibilityResponsePaymentsItemConstraints $constraints
     */
    #[JsonProperty('constraints')]
    public CreditNoteEligibilityResponsePaymentsItemConstraints $constraints;

    /**
     * @param array{
     *   transactionId: string,
     *   gateway: string,
     *   amountMinor: float,
     *   amountRefundedMinor: float,
     *   amountAvailableMinor: float,
     *   availableOperations: array<string>,
     *   constraints: CreditNoteEligibilityResponsePaymentsItemConstraints,
     *   paymentMethod?: ?string,
     *   cardBrand?: ?string,
     *   cardLast4?: ?string,
     *   terminalSerial?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transactionId = $values['transactionId'];
        $this->gateway = $values['gateway'];
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->amountRefundedMinor = $values['amountRefundedMinor'];
        $this->amountAvailableMinor = $values['amountAvailableMinor'];
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLast4 = $values['cardLast4'] ?? null;
        $this->terminalSerial = $values['terminalSerial'] ?? null;
        $this->availableOperations = $values['availableOperations'];
        $this->constraints = $values['constraints'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
