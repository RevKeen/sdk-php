<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class GetPaymentLinkResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchant_id')]
    public string $merchantId;

    /**
     * @var string $publicId
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var value-of<GetPaymentLinkResponseMode> $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var value-of<GetPaymentLinkResponseStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?int $amountMinor
     */
    #[JsonProperty('amount_minor')]
    public ?int $amountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

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
     * @var ?array<string> $productIds
     */
    #[JsonProperty('product_ids'), ArrayType(['string'])]
    public ?array $productIds;

    /**
     * @var ?array<GetPaymentLinkResponseLineItemsItem> $lineItems
     */
    #[JsonProperty('line_items'), ArrayType([GetPaymentLinkResponseLineItemsItem::class])]
    public ?array $lineItems;

    /**
     * @var ?string $successUrl Custom URL to redirect after successful payment. Supports placeholders: {CHECKOUT_ID}, {TRANSACTION_ID}, {PAYMENT_ID}, {CUSTOMER_ID}, {AMOUNT}, {CURRENCY}, {PORTAL_URL}. If not set, redirects to RevKeen's default success page.
     */
    #[JsonProperty('success_url')]
    public ?string $successUrl;

    /**
     * @var ?string $cancelUrl Custom URL to redirect if customer cancels the checkout. If not set, no cancel redirect is configured.
     */
    #[JsonProperty('cancel_url')]
    public ?string $cancelUrl;

    /**
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public ?string $redirectUrl;

    /**
     * @var ?bool $collectShipping
     */
    #[JsonProperty('collect_shipping')]
    public ?bool $collectShipping;

    /**
     * @var ?bool $allowPromotionCodes
     */
    #[JsonProperty('allow_promotion_codes')]
    public ?bool $allowPromotionCodes;

    /**
     * @var ?value-of<GetPaymentLinkResponseTaxBehavior> $taxBehavior
     */
    #[JsonProperty('tax_behavior')]
    public ?string $taxBehavior;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expires_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   merchantId: string,
     *   publicId: string,
     *   mode: value-of<GetPaymentLinkResponseMode>,
     *   status: value-of<GetPaymentLinkResponseStatus>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name?: ?string,
     *   slug?: ?string,
     *   amountMinor?: ?int,
     *   currency?: ?string,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     *   productIds?: ?array<string>,
     *   lineItems?: ?array<GetPaymentLinkResponseLineItemsItem>,
     *   successUrl?: ?string,
     *   cancelUrl?: ?string,
     *   redirectUrl?: ?string,
     *   collectShipping?: ?bool,
     *   allowPromotionCodes?: ?bool,
     *   taxBehavior?: ?value-of<GetPaymentLinkResponseTaxBehavior>,
     *   metadata?: ?array<string, mixed>,
     *   expiresAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->publicId = $values['publicId'];
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->mode = $values['mode'];
        $this->status = $values['status'];
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->productIds = $values['productIds'] ?? null;
        $this->lineItems = $values['lineItems'] ?? null;
        $this->successUrl = $values['successUrl'] ?? null;
        $this->cancelUrl = $values['cancelUrl'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->collectShipping = $values['collectShipping'] ?? null;
        $this->allowPromotionCodes = $values['allowPromotionCodes'] ?? null;
        $this->taxBehavior = $values['taxBehavior'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
