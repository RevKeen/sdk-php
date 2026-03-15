<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class MeterListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $data Array of meter objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @var MeterListResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public MeterListResponsePagination $pagination;

    /**
     * @param array{
     *   data: array<array<string, mixed>>,
     *   pagination: MeterListResponsePagination,
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
