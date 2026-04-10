<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CustomersEntitlementsListResponse extends JsonSerializableType
{
    /**
     * @var array<CustomersEntitlementsListResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([CustomersEntitlementsListResponseDataItem::class])]
    public array $data;

    /**
     * @var CustomersEntitlementsListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public CustomersEntitlementsListResponsePagination $pagination;

    /**
     * @var CustomersEntitlementsListResponseCustomer $customer
     */
    #[JsonProperty('customer')]
    public CustomersEntitlementsListResponseCustomer $customer;

    /**
     * @param array{
     *   data: array<CustomersEntitlementsListResponseDataItem>,
     *   pagination: CustomersEntitlementsListResponsePagination,
     *   customer: CustomersEntitlementsListResponseCustomer,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->pagination = $values['pagination'];
        $this->customer = $values['customer'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
