<?php

namespace RevKeen\CreditNotes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\TransactionReversalEligibilityResponse;
use RevKeen\Core\Json\JsonProperty;

class CreditNotesTransactionReversalEligibilityResponse extends JsonSerializableType
{
    /**
     * @var TransactionReversalEligibilityResponse $data
     */
    #[JsonProperty('data')]
    public TransactionReversalEligibilityResponse $data;

    /**
     * @param array{
     *   data: TransactionReversalEligibilityResponse,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
