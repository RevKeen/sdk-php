<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCheckoutWinbackListResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsCheckoutWinbackListResponseOpportunitiesItem> $opportunities
     */
    #[JsonProperty('opportunities'), ArrayType([AnalyticsCheckoutWinbackListResponseOpportunitiesItem::class])]
    public array $opportunities;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $page
     */
    #[JsonProperty('page')]
    public float $page;

    /**
     * @var float $pageSize
     */
    #[JsonProperty('pageSize')]
    public float $pageSize;

    /**
     * @param array{
     *   opportunities: array<AnalyticsCheckoutWinbackListResponseOpportunitiesItem>,
     *   total: float,
     *   page: float,
     *   pageSize: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->opportunities = $values['opportunities'];
        $this->total = $values['total'];
        $this->page = $values['page'];
        $this->pageSize = $values['pageSize'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
