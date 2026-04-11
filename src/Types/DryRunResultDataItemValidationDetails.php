<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DryRunResultDataItemValidationDetails extends JsonSerializableType
{
    /**
     * @var bool $meterMatched
     */
    #[JsonProperty('meterMatched')]
    public bool $meterMatched;

    /**
     * @var bool $customerMatched
     */
    #[JsonProperty('customerMatched')]
    public bool $customerMatched;

    /**
     * @var float $billableQuantity
     */
    #[JsonProperty('billableQuantity')]
    public float $billableQuantity;

    /**
     * @var bool $filtersPassed
     */
    #[JsonProperty('filtersPassed')]
    public bool $filtersPassed;

    /**
     * @param array{
     *   meterMatched: bool,
     *   customerMatched: bool,
     *   billableQuantity: float,
     *   filtersPassed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->meterMatched = $values['meterMatched'];
        $this->customerMatched = $values['customerMatched'];
        $this->billableQuantity = $values['billableQuantity'];
        $this->filtersPassed = $values['filtersPassed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
