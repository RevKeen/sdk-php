<?php

namespace RevKeen\Charges\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ChargesCaptureRequest extends JsonSerializableType
{
    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?int $amountMinor;

    /**
     * @param array{
     *   amountMinor?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMinor = $values['amountMinor'] ?? null;
    }
}
