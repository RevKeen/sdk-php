<?php

namespace RevKeen\SetupIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\SetupIntents\Types\CancelSetupIntentRequestCancellationReason;
use RevKeen\Core\Json\JsonProperty;

class CancelSetupIntentRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CancelSetupIntentRequestCancellationReason> $cancellationReason Reason for cancellation
     */
    #[JsonProperty('cancellation_reason')]
    public ?string $cancellationReason;

    /**
     * @param array{
     *   cancellationReason?: ?value-of<CancelSetupIntentRequestCancellationReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cancellationReason = $values['cancellationReason'] ?? null;
    }
}
