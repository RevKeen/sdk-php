<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class Pagination extends JsonSerializableType
{
    /**
     * @var string $kind Pagination type
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var int $page Current page number
     */
    #[JsonProperty('page')]
    public int $page;

    /**
     * @var int $limit Results per page
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var int $total Total matching results
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $totalPages Total pages available
     */
    #[JsonProperty('totalPages')]
    public int $totalPages;

    /**
     * @param array{
     *   kind: string,
     *   page: int,
     *   limit: int,
     *   total: int,
     *   totalPages: int,
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
