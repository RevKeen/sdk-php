<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutWinbackGetSummaryResponseByType extends JsonSerializableType
{
    /**
     * @var float $cancelledSubscription
     */
    #[JsonProperty('cancelledSubscription')]
    public float $cancelledSubscription;

    /**
     * @var float $repeatAbandoner
     */
    #[JsonProperty('repeatAbandoner')]
    public float $repeatAbandoner;

    /**
     * @var float $lapsedCustomer
     */
    #[JsonProperty('lapsedCustomer')]
    public float $lapsedCustomer;

    /**
     * @param array{
     *   cancelledSubscription: float,
     *   repeatAbandoner: float,
     *   lapsedCustomer: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cancelledSubscription = $values['cancelledSubscription'];
        $this->repeatAbandoner = $values['repeatAbandoner'];
        $this->lapsedCustomer = $values['lapsedCustomer'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
