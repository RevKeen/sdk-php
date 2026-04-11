<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A checkout session represents a customer's intent to pay.
 */
class CheckoutSession extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<CheckoutSessionObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $mode
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?float $amountTotal
     */
    #[JsonProperty('amount_total')]
    public ?float $amountTotal;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?string $paymentIntentId
     */
    #[JsonProperty('payment_intent_id')]
    public ?string $paymentIntentId;

    /**
     * @var ?string $invoiceId
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $subscriptionId
     */
    #[JsonProperty('subscription_id')]
    public ?string $subscriptionId;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $successUrl
     */
    #[JsonProperty('success_url')]
    public ?string $successUrl;

    /**
     * @var ?string $cancelUrl
     */
    #[JsonProperty('cancel_url')]
    public ?string $cancelUrl;

    /**
     * @var ?string $expiresAt
     */
    #[JsonProperty('expires_at')]
    public ?string $expiresAt;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<CheckoutSessionObject>,
     *   status: string,
     *   mode?: ?string,
     *   amountTotal?: ?float,
     *   currency?: ?string,
     *   customerId?: ?string,
     *   paymentIntentId?: ?string,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     *   url?: ?string,
     *   successUrl?: ?string,
     *   cancelUrl?: ?string,
     *   expiresAt?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->status = $values['status'];
        $this->mode = $values['mode'] ?? null;
        $this->amountTotal = $values['amountTotal'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->paymentIntentId = $values['paymentIntentId'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->successUrl = $values['successUrl'] ?? null;
        $this->cancelUrl = $values['cancelUrl'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
