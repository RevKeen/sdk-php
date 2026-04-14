<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * The test event that was sent, including delivery status.
 */
class TestEventResponse extends JsonSerializableType
{
    /**
     * @var bool $success Whether the test event was created
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?Event $event
     */
    #[JsonProperty('event')]
    public ?Event $event;

    /**
     * @var ?string $message Additional information
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   success: bool,
     *   event?: ?Event,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->event = $values['event'] ?? null;
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
