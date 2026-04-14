<?php

namespace RevKeen\CreditNotes\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CreditNotesTransactionReversalEligibilityRequest extends JsonSerializableType
{
    /**
     * @var ?bool $customerPresent Whether the customer is physically present at the terminal. Enables terminal-native reversal operations.
     */
    public ?bool $customerPresent;

    /**
     * @param array{
     *   customerPresent?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerPresent = $values['customerPresent'] ?? null;
    }
}
