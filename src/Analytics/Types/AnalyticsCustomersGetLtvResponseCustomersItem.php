<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCustomersGetLtvResponseCustomersItem extends JsonSerializableType
{
    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var string $customerName
     */
    #[JsonProperty('customerName')]
    public string $customerName;

    /**
     * @var float $ltv
     */
    #[JsonProperty('ltv')]
    public float $ltv;

    /**
     * @var float $totalRevenue
     */
    #[JsonProperty('totalRevenue')]
    public float $totalRevenue;

    /**
     * @var float $avgOrderValue
     */
    #[JsonProperty('avgOrderValue')]
    public float $avgOrderValue;

    /**
     * @var float $orderCount
     */
    #[JsonProperty('orderCount')]
    public float $orderCount;

    /**
     * @param array{
     *   customerId: string,
     *   customerName: string,
     *   ltv: float,
     *   totalRevenue: float,
     *   avgOrderValue: float,
     *   orderCount: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->customerName = $values['customerName'];
        $this->ltv = $values['ltv'];
        $this->totalRevenue = $values['totalRevenue'];
        $this->avgOrderValue = $values['avgOrderValue'];
        $this->orderCount = $values['orderCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
