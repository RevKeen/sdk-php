<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Invoices\Types\InvoicesExternalBatchRequestInvoicesItem;
use RevKeen\Core\Types\ArrayType;

class InvoicesExternalBatchRequest extends JsonSerializableType
{
    /**
     * @var string $source Integration source (e.g., practicehub, wodify)
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var array<InvoicesExternalBatchRequestInvoicesItem> $invoices Array of invoices to upsert (max 100)
     */
    #[JsonProperty('invoices'), ArrayType([InvoicesExternalBatchRequestInvoicesItem::class])]
    public array $invoices;

    /**
     * @param array{
     *   source: string,
     *   invoices: array<InvoicesExternalBatchRequestInvoicesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->invoices = $values['invoices'];
    }
}
