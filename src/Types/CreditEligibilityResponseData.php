<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreditEligibilityResponseData extends JsonSerializableType
{
    /**
     * @var bool $canCredit
     */
    #[JsonProperty('can_credit')]
    public bool $canCredit;

    /**
     * @var int $maxCreditableMinor
     */
    #[JsonProperty('max_creditable_minor')]
    public int $maxCreditableMinor;

    /**
     * @var int $totalCreditedMinor
     */
    #[JsonProperty('total_credited_minor')]
    public int $totalCreditedMinor;

    /**
     * @var int $invoiceTotalMinor
     */
    #[JsonProperty('invoice_total_minor')]
    public int $invoiceTotalMinor;

    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   canCredit: bool,
     *   maxCreditableMinor: int,
     *   totalCreditedMinor: int,
     *   invoiceTotalMinor: int,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canCredit = $values['canCredit'];
        $this->maxCreditableMinor = $values['maxCreditableMinor'];
        $this->totalCreditedMinor = $values['totalCreditedMinor'];
        $this->invoiceTotalMinor = $values['invoiceTotalMinor'];
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
