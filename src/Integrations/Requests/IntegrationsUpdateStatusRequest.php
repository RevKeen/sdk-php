<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsUpdateStatusRequestStatus;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsUpdateStatusRequest extends JsonSerializableType
{
    /**
     * @var value-of<IntegrationsUpdateStatusRequestStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $lastSyncError
     */
    #[JsonProperty('lastSyncError')]
    public ?string $lastSyncError;

    /**
     * @param array{
     *   status: value-of<IntegrationsUpdateStatusRequestStatus>,
     *   lastSyncError?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->lastSyncError = $values['lastSyncError'] ?? null;
    }
}
