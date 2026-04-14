<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class VoidListResponseMeta extends JsonSerializableType
{
    /**
     * @var float $total Total number of results matching the query
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $limit Maximum results per page
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $offset Number of results skipped
     */
    #[JsonProperty('offset')]
    public float $offset;

    /**
     * @var bool $hasMore Whether more results exist beyond this page
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   total: float,
     *   limit: float,
     *   offset: float,
     *   hasMore: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->total = $values['total'];
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
        $this->hasMore = $values['hasMore'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
