<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class WebhookEvent extends JsonSerializableType
{
    /**
     * @var string $id Unique event identifier
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $type Event type using dot notation (e.g., `payment.succeeded`)
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var int $created Unix timestamp when the event was created
     */
    #[JsonProperty('created')]
    public int $created;

    /**
     * @var ?bool $livemode Whether this event occurred in live mode
     */
    #[JsonProperty('livemode')]
    public ?bool $livemode;

    /**
     * @var WebhookEventData $data Event payload containing the affected object
     */
    #[JsonProperty('data')]
    public WebhookEventData $data;

    /**
     * @param array{
     *   id: string,
     *   type: string,
     *   created: int,
     *   data: WebhookEventData,
     *   livemode?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->created = $values['created'];
        $this->livemode = $values['livemode'] ?? null;
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
