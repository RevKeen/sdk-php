<?php

namespace RevKeen\Payouts\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PayoutsPaymentsListResponseMeta extends JsonSerializableType
{
    /**
     * @var string $payoutId
     */
    #[JsonProperty('payout_id')]
    public string $payoutId;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $offset
     */
    #[JsonProperty('offset')]
    public float $offset;

    /**
     * @param array{
     *   payoutId: string,
     *   total: float,
     *   limit: float,
     *   offset: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->payoutId = $values['payoutId'];
        $this->total = $values['total'];
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
