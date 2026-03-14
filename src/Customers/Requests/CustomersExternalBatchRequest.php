<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Customers\Types\CustomersExternalBatchRequestCustomersItem;
use RevKeen\Core\Types\ArrayType;

class CustomersExternalBatchRequest extends JsonSerializableType
{
    /**
     * @var string $source Integration source (e.g., practicehub, wodify)
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var array<CustomersExternalBatchRequestCustomersItem> $customers Array of customers to upsert (max 100)
     */
    #[JsonProperty('customers'), ArrayType([CustomersExternalBatchRequestCustomersItem::class])]
    public array $customers;

    /**
     * @param array{
     *   source: string,
     *   customers: array<CustomersExternalBatchRequestCustomersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->customers = $values['customers'];
    }
}
