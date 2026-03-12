<?php

namespace RevKeen\Businesses\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class GetBusinessesResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data Business objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @var GetBusinessesResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public GetBusinessesResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
     *   pagination: GetBusinessesResponsePagination,
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
