<?php

namespace RevKeen\TerminalPayments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class VoidTerminalPaymentRequest extends JsonSerializableType
{
    /**
     * @var ?string $reason Reason for the void
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
