<?php

namespace RevKeen\Products\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ProductsExternalBatchResponseFailedItem extends JsonSerializableType
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
     * @param array{
     *   externalId: string,
     *   error: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
