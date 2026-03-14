<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Invoices\Types\InvoicesSendRequestChannel;
use RevKeen\Core\Json\JsonProperty;

class InvoicesSendRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<InvoicesSendRequestChannel> $channel Communication channel to send the invoice through
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $templateId Optional custom template ID to use for the notification
     */
    #[JsonProperty('template_id')]
    public ?string $templateId;

    /**
     * @param array{
     *   channel?: ?value-of<InvoicesSendRequestChannel>,
     *   templateId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->channel = $values['channel'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
    }
}
