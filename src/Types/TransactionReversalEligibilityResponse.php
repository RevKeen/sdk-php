<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * Details about which reversal methods (refund, void, or credit note) are available for a specific transaction.
 */
class TransactionReversalEligibilityResponse extends JsonSerializableType
{
    /**
     * @var bool $canReverse
     */
    #[JsonProperty('can_reverse')]
    public bool $canReverse;

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
     * @var array<string> $availableOperations
     */
    #[JsonProperty('available_operations'), ArrayType(['string'])]
    public array $availableOperations;

    /**
     * @var TransactionReversalEligibilityResponseConstraints $constraints
     */
    #[JsonProperty('constraints')]
    public TransactionReversalEligibilityResponseConstraints $constraints;

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
     * @var ?string $terminalUti
     */
    #[JsonProperty('terminal_uti')]
    public ?string $terminalUti;

    /**
     * @param array{
     *   canReverse: bool,
     *   transactionId: string,
     *   gateway: string,
     *   availableOperations: array<string>,
     *   constraints: TransactionReversalEligibilityResponseConstraints,
     *   paymentMethod?: ?string,
     *   cardBrand?: ?string,
     *   cardLast4?: ?string,
     *   terminalSerial?: ?string,
     *   terminalUti?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canReverse = $values['canReverse'];
        $this->transactionId = $values['transactionId'];
        $this->gateway = $values['gateway'];
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->availableOperations = $values['availableOperations'];
        $this->constraints = $values['constraints'];
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLast4 = $values['cardLast4'] ?? null;
        $this->terminalSerial = $values['terminalSerial'] ?? null;
        $this->terminalUti = $values['terminalUti'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
