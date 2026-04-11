<?php

namespace RevKeen\Invoices\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class InvoicesExternalUpsertByExternalIdRequestCustomerExternalRef extends JsonSerializableType
{
    /**
     * @var string $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @param array{
     *   source: string,
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
