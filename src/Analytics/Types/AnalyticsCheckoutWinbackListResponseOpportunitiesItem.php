<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AnalyticsCheckoutWinbackListResponseOpportunitiesItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var ?string $customerEmail
     */
    #[JsonProperty('customerEmail')]
    public ?string $customerEmail;

    /**
     * @var value-of<AnalyticsCheckoutWinbackListResponseOpportunitiesItemOpportunityType> $opportunityType
     */
    #[JsonProperty('opportunityType')]
    public string $opportunityType;

    /**
     * @var value-of<AnalyticsCheckoutWinbackListResponseOpportunitiesItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?float $potentialValueCents
     */
    #[JsonProperty('potentialValueCents')]
    public ?float $potentialValueCents;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?float $previousPurchasesCents
     */
    #[JsonProperty('previousPurchasesCents')]
    public ?float $previousPurchasesCents;

    /**
     * @var ?string $cancelReason
     */
    #[JsonProperty('cancelReason')]
    public ?string $cancelReason;

    /**
     * @var ?string $lastActivityAt
     */
    #[JsonProperty('lastActivityAt')]
    public ?string $lastActivityAt;

    /**
     * @var float $winbackEmailsSent
     */
    #[JsonProperty('winbackEmailsSent')]
    public float $winbackEmailsSent;

    /**
     * @var ?string $specialOfferCode
     */
    #[JsonProperty('specialOfferCode')]
    public ?string $specialOfferCode;

    /**
     * @var ?float $specialOfferDiscount
     */
    #[JsonProperty('specialOfferDiscount')]
    public ?float $specialOfferDiscount;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('createdAt')]
    public string $createdAt;

    /**
     * @var ?string $expiresAt
     */
    #[JsonProperty('expiresAt')]
    public ?string $expiresAt;

    /**
     * @param array{
     *   id: string,
     *   customerId: string,
     *   opportunityType: value-of<AnalyticsCheckoutWinbackListResponseOpportunitiesItemOpportunityType>,
     *   status: value-of<AnalyticsCheckoutWinbackListResponseOpportunitiesItemStatus>,
     *   currency: string,
     *   winbackEmailsSent: float,
     *   createdAt: string,
     *   customerEmail?: ?string,
     *   potentialValueCents?: ?float,
     *   previousPurchasesCents?: ?float,
     *   cancelReason?: ?string,
     *   lastActivityAt?: ?string,
     *   specialOfferCode?: ?string,
     *   specialOfferDiscount?: ?float,
     *   expiresAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'];
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->opportunityType = $values['opportunityType'];
        $this->status = $values['status'];
        $this->potentialValueCents = $values['potentialValueCents'] ?? null;
        $this->currency = $values['currency'];
        $this->previousPurchasesCents = $values['previousPurchasesCents'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->lastActivityAt = $values['lastActivityAt'] ?? null;
        $this->winbackEmailsSent = $values['winbackEmailsSent'];
        $this->specialOfferCode = $values['specialOfferCode'] ?? null;
        $this->specialOfferDiscount = $values['specialOfferDiscount'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->expiresAt = $values['expiresAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
