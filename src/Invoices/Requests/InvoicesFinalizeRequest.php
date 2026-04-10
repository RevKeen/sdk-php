<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesFinalizeRequest extends JsonSerializableType
{
    /**
     * @var ?bool $autoAdvance If true, automatically transitions to 'approved' status after finalization.
     */
    #[JsonProperty('auto_advance')]
    public ?bool $autoAdvance;

    /**
     * @param array{
     *   autoAdvance?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autoAdvance = $values['autoAdvance'] ?? null;
    }
}
