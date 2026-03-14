<?php

namespace RevKeen\PaymentMethods\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class AttachPaymentMethodRequest extends JsonSerializableType
{
    /**
     * @var string $customerId ID of the customer to attach the payment method to
     */
    #[JsonProperty('customer_id')]
    public string $customerId;

    /**
     * @param array{
     *   customerId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
    }
}
