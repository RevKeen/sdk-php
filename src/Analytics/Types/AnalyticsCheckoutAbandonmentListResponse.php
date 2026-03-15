<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCheckoutAbandonmentListResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsCheckoutAbandonmentListResponseAlertsItem> $alerts
     */
    #[JsonProperty('alerts'), ArrayType([AnalyticsCheckoutAbandonmentListResponseAlertsItem::class])]
    public array $alerts;

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
     *   alerts: array<AnalyticsCheckoutAbandonmentListResponseAlertsItem>,
     *   total: float,
     *   page: float,
     *   pageSize: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->alerts = $values['alerts'];
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
