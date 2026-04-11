<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ChargeListResponsePagination extends JsonSerializableType
{
    /**
     * @var float $page Current page number
     */
    #[JsonProperty('page')]
    public float $page;

    /**
     * @var float $limit Maximum results per page
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $total Total number of results matching the query
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $totalPages Total number of pages available
     */
    #[JsonProperty('totalPages')]
    public float $totalPages;

    /**
     * @param array{
     *   page: float,
     *   limit: float,
     *   total: float,
     *   totalPages: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->page = $values['page'];
        $this->limit = $values['limit'];
        $this->total = $values['total'];
        $this->totalPages = $values['totalPages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
