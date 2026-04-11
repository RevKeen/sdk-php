<?php

namespace RevKeen\Products\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Products\Types\ProductsExternalBatchRequestProductsItem;
use RevKeen\Core\Types\ArrayType;

class ProductsExternalBatchRequest extends JsonSerializableType
{
    /**
     * @var string $source Integration source (e.g., practicehub, wodify)
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var array<ProductsExternalBatchRequestProductsItem> $products Array of products to upsert (max 100)
     */
    #[JsonProperty('products'), ArrayType([ProductsExternalBatchRequestProductsItem::class])]
    public array $products;

    /**
     * @param array{
     *   source: string,
     *   products: array<ProductsExternalBatchRequestProductsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->products = $values['products'];
    }
}
