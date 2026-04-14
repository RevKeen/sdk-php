<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A payout represents funds settled from processed payments to your bank account. Track settlement batches and reconcile amounts.
 */
class Payout extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $publicId
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var string $gateway
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var string $gatewayPayoutId
     */
    #[JsonProperty('gateway_payout_id')]
    public string $gatewayPayoutId;

    /**
     * @var float $grossAmountMinor Gross amount in cents
     */
    #[JsonProperty('gross_amount_minor')]
    public float $grossAmountMinor;

    /**
     * @var float $feesAmountMinor Fees in cents
     */
    #[JsonProperty('fees_amount_minor')]
    public float $feesAmountMinor;

    /**
     * @var float $netAmountMinor Net amount in cents
     */
    #[JsonProperty('net_amount_minor')]
    public float $netAmountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?float $chargesCount
     */
    #[JsonProperty('charges_count')]
    public ?float $chargesCount;

    /**
     * @var ?float $refundsCount
     */
    #[JsonProperty('refunds_count')]
    public ?float $refundsCount;

    /**
     * @var ?float $chargebacksCount
     */
    #[JsonProperty('chargebacks_count')]
    public ?float $chargebacksCount;

    /**
     * @var value-of<PayoutStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $arrivalDate
     */
    #[JsonProperty('arrival_date')]
    public ?string $arrivalDate;

    /**
     * @var ?string $settledAt
     */
    #[JsonProperty('settled_at')]
    public ?string $settledAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   gateway: string,
     *   gatewayPayoutId: string,
     *   grossAmountMinor: float,
     *   feesAmountMinor: float,
     *   netAmountMinor: float,
     *   currency: string,
     *   status: value-of<PayoutStatus>,
     *   createdAt: string,
     *   chargesCount?: ?float,
     *   refundsCount?: ?float,
     *   chargebacksCount?: ?float,
     *   arrivalDate?: ?string,
     *   settledAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'];
        $this->gateway = $values['gateway'];
        $this->gatewayPayoutId = $values['gatewayPayoutId'];
        $this->grossAmountMinor = $values['grossAmountMinor'];
        $this->feesAmountMinor = $values['feesAmountMinor'];
        $this->netAmountMinor = $values['netAmountMinor'];
        $this->currency = $values['currency'];
        $this->chargesCount = $values['chargesCount'] ?? null;
        $this->refundsCount = $values['refundsCount'] ?? null;
        $this->chargebacksCount = $values['chargebacksCount'] ?? null;
        $this->status = $values['status'];
        $this->arrivalDate = $values['arrivalDate'] ?? null;
        $this->settledAt = $values['settledAt'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
