<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class BillingPreviewResponseData extends JsonSerializableType
{
    /**
     * @var array<BillingPreviewResponseDataItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([BillingPreviewResponseDataItemsItem::class])]
    public array $items;

    /**
     * @var string $summary
     */
    #[JsonProperty('summary')]
    public string $summary;

    /**
     * @var int $totalAmountMinor
     */
    #[JsonProperty('totalAmountMinor')]
    public int $totalAmountMinor;

    /**
     * @var DateTime $firstChargeDate
     */
    #[JsonProperty('firstChargeDate'), Date(Date::TYPE_DATETIME)]
    public DateTime $firstChargeDate;

    /**
     * @var ?DateTime $trialEndDate
     */
    #[JsonProperty('trialEndDate'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $trialEndDate;

    /**
     * @var ?DateTime $scheduleEndDate
     */
    #[JsonProperty('scheduleEndDate'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduleEndDate;

    /**
     * @var string $timezone
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @param array{
     *   items: array<BillingPreviewResponseDataItemsItem>,
     *   summary: string,
     *   totalAmountMinor: int,
     *   firstChargeDate: DateTime,
     *   timezone: string,
     *   trialEndDate?: ?DateTime,
     *   scheduleEndDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->summary = $values['summary'];
        $this->totalAmountMinor = $values['totalAmountMinor'];
        $this->firstChargeDate = $values['firstChargeDate'];
        $this->trialEndDate = $values['trialEndDate'] ?? null;
        $this->scheduleEndDate = $values['scheduleEndDate'] ?? null;
        $this->timezone = $values['timezone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
