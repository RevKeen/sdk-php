<?php

namespace RevKeen\Entitlements\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomersEntitlementsListResponsePagination extends JsonSerializableType
{
    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $offset
     */
    #[JsonProperty('offset')]
    public float $offset;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @param array{
     *   limit: float,
     *   offset: float,
     *   total: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
