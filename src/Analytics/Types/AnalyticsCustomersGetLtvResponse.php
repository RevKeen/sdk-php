<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCustomersGetLtvResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsCustomersGetLtvResponseCustomersItem> $customers
     */
    #[JsonProperty('customers'), ArrayType([AnalyticsCustomersGetLtvResponseCustomersItem::class])]
    public array $customers;

    /**
     * @var float $avgLtv
     */
    #[JsonProperty('avgLtv')]
    public float $avgLtv;

    /**
     * @var float $medianLtv
     */
    #[JsonProperty('medianLtv')]
    public float $medianLtv;

    /**
     * @param array{
     *   customers: array<AnalyticsCustomersGetLtvResponseCustomersItem>,
     *   avgLtv: float,
     *   medianLtv: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customers = $values['customers'];
        $this->avgLtv = $values['avgLtv'];
        $this->medianLtv = $values['medianLtv'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
