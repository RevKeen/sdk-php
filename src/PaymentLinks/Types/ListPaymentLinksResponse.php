<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ListPaymentLinksResponse extends JsonSerializableType
{
    /**
     * @var array<ListPaymentLinksResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListPaymentLinksResponseDataItem::class])]
    public array $data;

    /**
     * @var ListPaymentLinksResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ListPaymentLinksResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<ListPaymentLinksResponseDataItem>,
     *   pagination: ListPaymentLinksResponsePagination,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->pagination = $values['pagination'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
