<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesRejectRequest extends JsonSerializableType
{
    /**
     * @var string $reason Reason for rejecting the invoice (required)
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   reason: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }
}
