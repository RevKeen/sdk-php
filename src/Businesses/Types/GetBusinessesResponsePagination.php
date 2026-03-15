<?php

namespace RevKeen\Businesses\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class GetBusinessesResponsePagination extends JsonSerializableType
{
    /**
     * @var string $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var float $page
     */
    #[JsonProperty('page')]
    public float $page;

    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $totalPages
     */
    #[JsonProperty('totalPages')]
    public float $totalPages;

    /**
     * @param array{
     *   kind: string,
     *   page: float,
     *   limit: float,
     *   total: float,
     *   totalPages: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
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
