<?php

namespace RevKeen\Invoices\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesExternalBatchResponseFailedItem extends JsonSerializableType
{
    /**
     * @var string $externalId
     */
    #[JsonProperty('external_id')]
    public string $externalId;

    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var ?string $reasonCode
     */
    #[JsonProperty('reason_code')]
    public ?string $reasonCode;

    /**
     * @param array{
     *   externalId: string,
     *   error: string,
     *   reasonCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->error = $values['error'];
        $this->reasonCode = $values['reasonCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
