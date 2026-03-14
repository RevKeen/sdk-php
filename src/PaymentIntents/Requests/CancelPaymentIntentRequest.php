<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\PaymentIntents\Types\CancelPaymentIntentRequestCancellationReason;
use RevKeen\Core\Json\JsonProperty;

class CancelPaymentIntentRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CancelPaymentIntentRequestCancellationReason> $cancellationReason Reason for cancellation
     */
    #[JsonProperty('cancellation_reason')]
    public ?string $cancellationReason;

    /**
     * @param array{
     *   cancellationReason?: ?value-of<CancelPaymentIntentRequestCancellationReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cancellationReason = $values['cancellationReason'] ?? null;
    }
}
