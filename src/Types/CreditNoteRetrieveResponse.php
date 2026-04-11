<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single credit note with full details including the associated invoice and refund.
 */
class CreditNoteRetrieveResponse extends JsonSerializableType
{
    /**
     * @var CreditNote $data
     */
    #[JsonProperty('data')]
    public CreditNote $data;

    /**
     * @param array{
     *   data: CreditNote,
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
