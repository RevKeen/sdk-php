<?php

namespace RevKeen\SubscriptionSchedules\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CancelSubscriptionScheduleRequest extends JsonSerializableType
{
    /**
     * @var ?bool $invoiceNow Generate a final invoice immediately
     */
    #[JsonProperty('invoice_now')]
    public ?bool $invoiceNow;

    /**
     * @var ?bool $prorate Prorate final invoice
     */
    #[JsonProperty('prorate')]
    public ?bool $prorate;

    /**
     * @param array{
     *   invoiceNow?: ?bool,
     *   prorate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoiceNow = $values['invoiceNow'] ?? null;
        $this->prorate = $values['prorate'] ?? null;
    }
}
