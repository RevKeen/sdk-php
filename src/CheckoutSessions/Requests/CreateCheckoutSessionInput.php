<?php

namespace RevKeen\CheckoutSessions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\CheckoutSessions\Types\CreateCheckoutSessionInputAllowedMethodsItem;
use RevKeen\Core\Types\ArrayType;

class CreateCheckoutSessionInput extends JsonSerializableType
{
    /**
     * @var ?string $invoiceId
     */
    #[JsonProperty('invoiceId')]
    public ?string $invoiceId;

    /**
     * @var ?string $productId
     */
    #[JsonProperty('productId')]
    public ?string $productId;

    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?int $amountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $successUrl
     */
    #[JsonProperty('successUrl')]
    public ?string $successUrl;

    /**
     * @var ?string $cancelUrl
     */
    #[JsonProperty('cancelUrl')]
    public ?string $cancelUrl;

    /**
     * @var ?array<value-of<CreateCheckoutSessionInputAllowedMethodsItem>> $allowedMethods Payment methods to offer. Intersected with merchant capabilities. Defaults to merchant config.
     */
    #[JsonProperty('allowedMethods'), ArrayType(['string'])]
    public ?array $allowedMethods;

    /**
     * @var ?string $companionDeviceId Target a registered companion device. Session is pushed via SSE to the device.
     */
    #[JsonProperty('companionDeviceId')]
    public ?string $companionDeviceId;

    /**
     * @param array{
     *   invoiceId?: ?string,
     *   productId?: ?string,
     *   amountMinor?: ?int,
     *   currency?: ?string,
     *   successUrl?: ?string,
     *   cancelUrl?: ?string,
     *   allowedMethods?: ?array<value-of<CreateCheckoutSessionInputAllowedMethodsItem>>,
     *   companionDeviceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->successUrl = $values['successUrl'] ?? null;
        $this->cancelUrl = $values['cancelUrl'] ?? null;
        $this->allowedMethods = $values['allowedMethods'] ?? null;
        $this->companionDeviceId = $values['companionDeviceId'] ?? null;
    }
}
