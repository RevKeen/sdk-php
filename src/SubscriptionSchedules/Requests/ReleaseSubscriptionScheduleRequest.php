<?php

namespace RevKeen\SubscriptionSchedules\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ReleaseSubscriptionScheduleRequest extends JsonSerializableType
{
    /**
     * @var ?bool $preserveCancelDate Keep the subscription's cancel_at date if set
     */
    #[JsonProperty('preserve_cancel_date')]
    public ?bool $preserveCancelDate;

    /**
     * @param array{
     *   preserveCancelDate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->preserveCancelDate = $values['preserveCancelDate'] ?? null;
    }
}
