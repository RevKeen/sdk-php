<?php

namespace RevKeen\Comms\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CommsMessagesSendResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var string $conversationId
     */
    #[JsonProperty('conversationId')]
    public string $conversationId;

    /**
     * @var string $messageId
     */
    #[JsonProperty('messageId')]
    public string $messageId;

    /**
     * @var string $notificationId
     */
    #[JsonProperty('notificationId')]
    public string $notificationId;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @param array{
     *   success: bool,
     *   conversationId: string,
     *   messageId: string,
     *   notificationId: string,
     *   customerId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->conversationId = $values['conversationId'];
        $this->messageId = $values['messageId'];
        $this->notificationId = $values['notificationId'];
        $this->customerId = $values['customerId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
