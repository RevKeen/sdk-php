<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ResendWebhookResponse extends JsonSerializableType
{
    /**
     * @var bool $success Whether the webhook was queued for resending
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $webhookEndpointId The webhook endpoint ID the event was sent to
     */
    #[JsonProperty('webhook_endpoint_id')]
    public ?string $webhookEndpointId;

    /**
     * @var ?string $message Additional information
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   success: bool,
     *   webhookEndpointId?: ?string,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->webhookEndpointId = $values['webhookEndpointId'] ?? null;
        $this->message = $values['message'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
