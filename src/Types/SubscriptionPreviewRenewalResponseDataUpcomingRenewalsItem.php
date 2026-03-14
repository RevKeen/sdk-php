<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class SubscriptionPreviewRenewalResponseDataUpcomingRenewalsItem extends JsonSerializableType
{
    /**
     * @var int $sequence
     */
    #[JsonProperty('sequence')]
    public int $sequence;

    /**
     * @var DateTime $date
     */
    #[JsonProperty('date'), Date(Date::TYPE_DATETIME)]
    public DateTime $date;

    /**
     * @var string $formattedDate
     */
    #[JsonProperty('formattedDate')]
    public string $formattedDate;

    /**
     * @var string $dayName
     */
    #[JsonProperty('dayName')]
    public string $dayName;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public int $amountMinor;

    /**
     * @var string $formattedAmount
     */
    #[JsonProperty('formattedAmount')]
    public string $formattedAmount;

    /**
     * @var ?bool $isTrialEnd
     */
    #[JsonProperty('isTrialEnd')]
    public ?bool $isTrialEnd;

    /**
     * @var ?bool $isFirstCharge
     */
    #[JsonProperty('isFirstCharge')]
    public ?bool $isFirstCharge;

    /**
     * @var ?bool $isFinalPayment
     */
    #[JsonProperty('isFinalPayment')]
    public ?bool $isFinalPayment;

    /**
     * @param array{
     *   sequence: int,
     *   date: DateTime,
     *   formattedDate: string,
     *   dayName: string,
     *   amountMinor: int,
     *   formattedAmount: string,
     *   isTrialEnd?: ?bool,
     *   isFirstCharge?: ?bool,
     *   isFinalPayment?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sequence = $values['sequence'];
        $this->date = $values['date'];
        $this->formattedDate = $values['formattedDate'];
        $this->dayName = $values['dayName'];
        $this->amountMinor = $values['amountMinor'];
        $this->formattedAmount = $values['formattedAmount'];
        $this->isTrialEnd = $values['isTrialEnd'] ?? null;
        $this->isFirstCharge = $values['isFirstCharge'] ?? null;
        $this->isFinalPayment = $values['isFinalPayment'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
