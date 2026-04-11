<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

/**
 * A saved payment instrument (card, bank account, etc.) attached to a customer for future charges.
 */
class PaymentMethod extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the payment method
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PaymentMethodObject> $object Object type, always 'payment_method'
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var ?string $publicId Public ID visible in API responses (pm_xxx format)
     */
    #[JsonProperty('public_id')]
    public ?string $publicId;

    /**
     * @var value-of<PaymentMethodType> $type The type of payment method
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<PaymentMethodStatus> $status The status of the payment method
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $customerId ID of the customer this payment method belongs to
     */
    #[JsonProperty('customer_id')]
    public string $customerId;

    /**
     * @var bool $isDefault Whether this is the customer's default payment method
     */
    #[JsonProperty('is_default')]
    public bool $isDefault;

    /**
     * @var ?CardDetails $card
     */
    #[JsonProperty('card')]
    public ?CardDetails $card;

    /**
     * @var ?BankAccountDetails $usBankAccount
     */
    #[JsonProperty('us_bank_account')]
    public ?BankAccountDetails $usBankAccount;

    /**
     * @var ?BillingDetails $billingDetails
     */
    #[JsonProperty('billing_details')]
    public ?BillingDetails $billingDetails;

    /**
     * @var array<string, mixed> $metadata Custom metadata attached to the payment method
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public array $metadata;

    /**
     * @var DateTime $createdAt When the payment method was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the payment method was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<PaymentMethodObject>,
     *   type: value-of<PaymentMethodType>,
     *   status: value-of<PaymentMethodStatus>,
     *   customerId: string,
     *   isDefault: bool,
     *   metadata: array<string, mixed>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   publicId?: ?string,
     *   card?: ?CardDetails,
     *   usBankAccount?: ?BankAccountDetails,
     *   billingDetails?: ?BillingDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->publicId = $values['publicId'] ?? null;
        $this->type = $values['type'];
        $this->status = $values['status'];
        $this->customerId = $values['customerId'];
        $this->isDefault = $values['isDefault'];
        $this->card = $values['card'] ?? null;
        $this->usBankAccount = $values['usBankAccount'] ?? null;
        $this->billingDetails = $values['billingDetails'] ?? null;
        $this->metadata = $values['metadata'];
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
