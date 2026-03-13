<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class Event extends JsonSerializableType
{
    /**
     * @var string $id Unique event identifier
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<EventObject> $object Object type
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $type Event type (e.g., invoice.paid, payment.succeeded)
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var EventData $data Event data containing the affected object
     */
    #[JsonProperty('data')]
    public EventData $data;

    /**
     * @var ?EventRequest $request
     */
    #[JsonProperty('request')]
    public ?EventRequest $request;

    /**
     * @var int $pendingWebhooks Number of webhooks still pending delivery for this event
     */
    #[JsonProperty('pending_webhooks')]
    public int $pendingWebhooks;

    /**
     * @var ?string $apiVersion API version used to render this event
     */
    #[JsonProperty('api_version')]
    public ?string $apiVersion;

    /**
     * @var bool $livemode Whether this event was produced in live mode
     */
    #[JsonProperty('livemode')]
    public bool $livemode;

    /**
     * @var int $created Unix timestamp when the event was created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<EventObject>,
     *   type: string,
     *   data: EventData,
     *   pendingWebhooks: int,
     *   livemode: bool,
     *   created: int,
     *   request?: ?EventRequest,
     *   apiVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->type = $values['type'];
        $this->data = $values['data'];
        $this->request = $values['request'] ?? null;
        $this->pendingWebhooks = $values['pendingWebhooks'];
        $this->apiVersion = $values['apiVersion'] ?? null;
        $this->livemode = $values['livemode'];
        $this->created = $values['created'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
