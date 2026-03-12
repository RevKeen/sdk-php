<?php

namespace RevKeen\PaymentMethods\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\BillingDetails;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UpdatePaymentMethodRequest extends JsonSerializableType
{
    /**
     * @var ?BillingDetails $billingDetails
     */
    #[JsonProperty('billing_details')]
    public ?BillingDetails $billingDetails;

    /**
     * @var ?array<string, mixed> $metadata Custom metadata to attach
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   billingDetails?: ?BillingDetails,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->billingDetails = $values['billingDetails'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
