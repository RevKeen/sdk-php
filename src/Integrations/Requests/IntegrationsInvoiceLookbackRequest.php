<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsInvoiceLookbackRequest extends JsonSerializableType
{
    /**
     * @var int $invoiceLookbackDays
     */
    #[JsonProperty('invoiceLookbackDays')]
    public int $invoiceLookbackDays;

    /**
     * @param array{
     *   invoiceLookbackDays: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceLookbackDays = $values['invoiceLookbackDays'];
    }
}
