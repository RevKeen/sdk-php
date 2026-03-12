<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Subscriptions\Types\CancelSubscriptionInputMode;
use RevKeen\Core\Json\JsonProperty;

class CancelSubscriptionInput extends JsonSerializableType
{
    /**
     * @var value-of<CancelSubscriptionInputMode> $mode Cancel mode: "immediately" revokes access now, "period_end" schedules cancellation at billing period end
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var ?string $reason Optional reason for cancellation
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   mode: value-of<CancelSubscriptionInputMode>,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mode = $values['mode'];
        $this->reason = $values['reason'] ?? null;
    }
}
