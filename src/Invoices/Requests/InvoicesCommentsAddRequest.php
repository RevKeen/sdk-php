<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesCommentsAddRequest extends JsonSerializableType
{
    /**
     * @var string $content The comment content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var ?bool $isInternal If true, comment is only visible to merchant. If false, visible to customer.
     */
    #[JsonProperty('isInternal')]
    public ?bool $isInternal;

    /**
     * @param array{
     *   content: string,
     *   isInternal?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'];
        $this->isInternal = $values['isInternal'] ?? null;
    }
}
