<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class EntitlementListResponse extends JsonSerializableType
{
    /**
     * @var array<Entitlement> $data
     */
    #[JsonProperty('data'), ArrayType([Entitlement::class])]
    public array $data;

    /**
     * @var EntitlementListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public EntitlementListResponsePagination $pagination;

    /**
     * @var EntitlementListResponseCustomer $customer
     */
    #[JsonProperty('customer')]
    public EntitlementListResponseCustomer $customer;

    /**
     * @param array{
     *   data: array<Entitlement>,
     *   pagination: EntitlementListResponsePagination,
     *   customer: EntitlementListResponseCustomer,
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
