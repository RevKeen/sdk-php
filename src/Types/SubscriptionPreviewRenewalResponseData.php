<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

class SubscriptionPreviewRenewalResponseData extends JsonSerializableType
{
    /**
     * @var string $subscriptionId
     */
    #[JsonProperty('subscriptionId')]
    public string $subscriptionId;

    /**
     * @var DateTime $currentPeriodEnd
     */
    #[JsonProperty('currentPeriodEnd'), Date(Date::TYPE_DATETIME)]
    public DateTime $currentPeriodEnd;

    /**
     * @var array<SubscriptionPreviewRenewalResponseDataUpcomingRenewalsItem> $upcomingRenewals
     */
    #[JsonProperty('upcomingRenewals'), ArrayType([SubscriptionPreviewRenewalResponseDataUpcomingRenewalsItem::class])]
    public array $upcomingRenewals;

    /**
     * @var int $nextInvoiceAmountMinor
     */
    #[JsonProperty('nextInvoiceAmountMinor')]
    public int $nextInvoiceAmountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @param array{
     *   subscriptionId: string,
     *   currentPeriodEnd: DateTime,
     *   upcomingRenewals: array<SubscriptionPreviewRenewalResponseDataUpcomingRenewalsItem>,
     *   nextInvoiceAmountMinor: int,
     *   currency: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->currentPeriodEnd = $values['currentPeriodEnd'];
        $this->upcomingRenewals = $values['upcomingRenewals'];
        $this->nextInvoiceAmountMinor = $values['nextInvoiceAmountMinor'];
        $this->currency = $values['currency'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
