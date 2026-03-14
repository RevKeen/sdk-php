<?php

namespace RevKeen\Charges\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Charges\Types\ChargesRefundRequestReason;

class ChargesRefundRequest extends JsonSerializableType
{
    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?int $amountMinor;

    /**
     * @var ?value-of<ChargesRefundRequestReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   amountMinor?: ?int,
     *   reason?: ?value-of<ChargesRefundRequestReason>,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->notes = $values['notes'] ?? null;
    }
}
