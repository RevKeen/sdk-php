<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single product object with full details and associated prices.
 */
class ProductRetrieveResponse extends JsonSerializableType
{
    /**
     * @var Product $data
     */
    #[JsonProperty('data')]
    public Product $data;

    /**
     * @param array{
     *   data: Product,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
