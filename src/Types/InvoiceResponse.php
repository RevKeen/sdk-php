<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoiceResponse extends JsonSerializableType
{
    /**
     * @var Invoice $data
     */
    #[JsonProperty('data')]
    public Invoice $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: Invoice,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
