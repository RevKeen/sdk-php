<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreditNoteResponse extends JsonSerializableType
{
    /**
     * @var CreditNote $data
     */
    #[JsonProperty('data')]
    public CreditNote $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: CreditNote,
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
