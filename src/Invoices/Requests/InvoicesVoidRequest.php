<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesVoidRequest extends JsonSerializableType
{
    /**
     * @var ?string $reason Reason for voiding the invoice
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
    }
}
