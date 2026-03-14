<?php

namespace RevKeen\PaymentLinks\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\PaymentLinks\Types\UpdatePaymentLinkStatusRequestStatus;
use RevKeen\Core\Json\JsonProperty;

class UpdatePaymentLinkStatusRequest extends JsonSerializableType
{
    /**
     * @var value-of<UpdatePaymentLinkStatusRequestStatus> $status New status for the payment link
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   status: value-of<UpdatePaymentLinkStatusRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
