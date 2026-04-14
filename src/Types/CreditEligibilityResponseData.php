<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreditEligibilityResponseData extends JsonSerializableType
{
    /**
     * @var bool $canCredit Whether a credit note can be issued for this invoice
     */
    #[JsonProperty('can_credit')]
    public bool $canCredit;

    /**
     * @var int $maxCreditableMinor Maximum amount that can be credited in minor units
     */
    #[JsonProperty('max_creditable_minor')]
    public int $maxCreditableMinor;

    /**
     * @var int $totalCreditedMinor Total amount already credited against this invoice
     */
    #[JsonProperty('total_credited_minor')]
    public int $totalCreditedMinor;

    /**
     * @var int $invoiceTotalMinor Original invoice total in minor units
     */
    #[JsonProperty('invoice_total_minor')]
    public int $invoiceTotalMinor;

    /**
     * @var ?string $reason Reason why the invoice cannot be credited, if applicable
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
