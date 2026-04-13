<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreditNoteEligibilityResponsePaymentsItemConstraints extends JsonSerializableType
{
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
     * @param array{
     *   partialSupported: bool,
     *   requiresCardPresent: bool,
     *   requiresTerminalOnline: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->partialSupported = $values['partialSupported'];
        $this->requiresCardPresent = $values['requiresCardPresent'];
        $this->requiresTerminalOnline = $values['requiresTerminalOnline'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
