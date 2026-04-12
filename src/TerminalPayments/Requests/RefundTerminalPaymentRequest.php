<?php

namespace RevKeen\TerminalPayments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class RefundTerminalPaymentRequest extends JsonSerializableType
{
    /**
     * @var ?int $amountMinor Amount to refund in minor units. Omit for a full refund.
     */
    #[JsonProperty('amount_minor')]
    public ?int $amountMinor;

    /**
     * @var ?string $reason Reason for the refund
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   amountMinor?: ?int,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }
}
