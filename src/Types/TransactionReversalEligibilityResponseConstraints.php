<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class TransactionReversalEligibilityResponseConstraints extends JsonSerializableType
{
    /**
     * @var float $maxAmount
     */
    #[JsonProperty('max_amount')]
    public float $maxAmount;

    /**
     * @var bool $partialSupported
     */
    #[JsonProperty('partial_supported')]
    public bool $partialSupported;

    /**
     * @var bool $requiresCardPresent
     */
    #[JsonProperty('requires_card_present')]
    public bool $requiresCardPresent;

    /**
     * @var bool $requiresTerminalOnline
     */
    #[JsonProperty('requires_terminal_online')]
    public bool $requiresTerminalOnline;

    /**
     * @var bool $requiresCustomerIban
     */
    #[JsonProperty('requires_customer_iban')]
    public bool $requiresCustomerIban;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   maxAmount: float,
     *   partialSupported: bool,
     *   requiresCardPresent: bool,
     *   requiresTerminalOnline: bool,
     *   requiresCustomerIban: bool,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->maxAmount = $values['maxAmount'];
        $this->partialSupported = $values['partialSupported'];
        $this->requiresCardPresent = $values['requiresCardPresent'];
        $this->requiresTerminalOnline = $values['requiresTerminalOnline'];
        $this->requiresCustomerIban = $values['requiresCustomerIban'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
