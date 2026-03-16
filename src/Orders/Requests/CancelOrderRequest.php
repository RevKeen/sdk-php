<?php

namespace RevKeen\Orders\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CancelOrderRequest extends JsonSerializableType
{
    /**
     * @var ?string $reason Reason for cancellation
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
