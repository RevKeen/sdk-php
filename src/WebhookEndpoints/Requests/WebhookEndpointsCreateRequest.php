<?php

namespace RevKeen\WebhookEndpoints\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class WebhookEndpointsCreateRequest extends JsonSerializableType
{
    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var array<string> $enabledEvents
     */
    #[JsonProperty('enabled_events'), ArrayType(['string'])]
    public array $enabledEvents;

    /**
     * @var ?string $description
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
