<?php

namespace RevKeen\CreditNotes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\CreditNoteEligibilityResponse;
use RevKeen\Core\Json\JsonProperty;

class CreditNotesInvoiceEligibilityResponse extends JsonSerializableType
{
    /**
     * @var CreditNoteEligibilityResponse $data
     */
    #[JsonProperty('data')]
    public CreditNoteEligibilityResponse $data;

    /**
     * @param array{
     *   data: CreditNoteEligibilityResponse,
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
