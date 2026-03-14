<?php

namespace RevKeen\WebhookEndpoints\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CreateWebhookEndpointInput extends JsonSerializableType
{
    /**
     * @var string $url The URL that will receive webhook events
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var array<string> $enabledEvents Events to subscribe to. Use wildcards like `invoice.*` or `*` for all events.
     */
    #[JsonProperty('enabled_events'), ArrayType(['string'])]
    public array $enabledEvents;

    /**
     * @var ?string $description Optional description for this endpoint
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   url: string,
     *   enabledEvents: array<string>,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->enabledEvents = $values['enabledEvents'];
        $this->description = $values['description'] ?? null;
    }
}
