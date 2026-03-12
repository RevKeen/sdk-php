<?php

namespace RevKeen\Comms\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Comms\Types\CommsMessagesSendRequestChannel;
use RevKeen\Comms\Types\CommsMessagesSendRequestEntityType;
use RevKeen\Comms\Types\CommsMessagesSendRequestSource;
use RevKeen\Core\Types\ArrayType;

class CommsMessagesSendRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * @var ?string $customerEmail
     */
    #[JsonProperty('customerEmail')]
    public ?string $customerEmail;

    /**
     * @var ?string $threadId
     */
    #[JsonProperty('threadId')]
    public ?string $threadId;

    /**
     * @var value-of<CommsMessagesSendRequestChannel> $channel
     */
    #[JsonProperty('channel')]
    public string $channel;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var string $body
     */
    #[JsonProperty('body')]
    public string $body;

    /**
     * @var ?string $bodyHtml
     */
    #[JsonProperty('bodyHtml')]
    public ?string $bodyHtml;

    /**
     * @var ?value-of<CommsMessagesSendRequestEntityType> $entityType
     */
    #[JsonProperty('entityType')]
    public ?string $entityType;

    /**
     * @var ?string $entityId
     */
    #[JsonProperty('entityId')]
    public ?string $entityId;

    /**
     * @var ?string $entityUrl
     */
    #[JsonProperty('entityUrl')]
    public ?string $entityUrl;

    /**
     * @var ?value-of<CommsMessagesSendRequestSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?array<string, mixed> $metadata Custom key-value metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   channel: value-of<CommsMessagesSendRequestChannel>,
     *   body: string,
     *   customerId?: ?string,
     *   customerEmail?: ?string,
     *   threadId?: ?string,
     *   subject?: ?string,
     *   bodyHtml?: ?string,
     *   entityType?: ?value-of<CommsMessagesSendRequestEntityType>,
     *   entityId?: ?string,
     *   entityUrl?: ?string,
     *   source?: ?value-of<CommsMessagesSendRequestSource>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->threadId = $values['threadId'] ?? null;
        $this->channel = $values['channel'];
        $this->subject = $values['subject'] ?? null;
        $this->body = $values['body'];
        $this->bodyHtml = $values['bodyHtml'] ?? null;
        $this->entityType = $values['entityType'] ?? null;
        $this->entityId = $values['entityId'] ?? null;
        $this->entityUrl = $values['entityUrl'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
