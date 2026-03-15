<?php

namespace RevKeen\Products\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ProductsExternalUpsertResponse extends JsonSerializableType
{
    /**
     * @var ProductsExternalUpsertResponseData $data
     */
    #[JsonProperty('data')]
    public ProductsExternalUpsertResponseData $data;

    /**
     * @var bool $created
     */
    #[JsonProperty('created')]
    public bool $created;

    /**
     * @var ?bool $skipped
     */
    #[JsonProperty('skipped')]
    public ?bool $skipped;

    /**
     * @param array{
     *   data: ProductsExternalUpsertResponseData,
     *   created: bool,
     *   skipped?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->created = $values['created'];
        $this->skipped = $values['skipped'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
