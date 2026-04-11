<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A payment included in a payout settlement batch, with amount and fee details.
 */
class PayoutPayment extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $publicId
     */
    #[JsonProperty('public_id')]
    public ?string $publicId;

    /**
     * @var float $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $paidAt
     */
    #[JsonProperty('paid_at')]
    public ?string $paidAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   amountMinor: float,
     *   currency: string,
     *   status: string,
     *   createdAt: string,
     *   publicId?: ?string,
     *   kind?: ?string,
     *   paidAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->kind = $values['kind'] ?? null;
        $this->paidAt = $values['paidAt'] ?? null;
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
