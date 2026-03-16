<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class SetupIntent extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the setup intent
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<SetupIntentObject> $object Object type, always 'setup_intent'
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var string $publicId Public ID visible in API responses (seti_xxx format)
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var value-of<SetupIntentStatus> $status The status of the setup intent
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $customerId ID of the customer this setup intent is for
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?string $paymentMethodId ID of the payment method being set up
     */
    #[JsonProperty('payment_method_id')]
    public ?string $paymentMethodId;

    /**
     * @var array<string> $paymentMethodTypes Allowed payment method types for this setup
     */
    #[JsonProperty('payment_method_types'), ArrayType(['string'])]
    public array $paymentMethodTypes;

    /**
     * @var value-of<SetupIntentUsage> $usage Indicates how the payment method will be used
     */
    #[JsonProperty('usage')]
    public string $usage;

    /**
     * @var ?SetupIntentNextAction $nextAction
     */
    #[JsonProperty('next_action')]
    public ?SetupIntentNextAction $nextAction;

    /**
     * @var string $clientSecret Client secret for frontend confirmation
     */
    #[JsonProperty('client_secret')]
    public string $clientSecret;

    /**
     * @var string $gateway Payment gateway used
     */
    #[JsonProperty('gateway')]
    public string $gateway;

    /**
     * @var ?SetupIntentError $lastError
     */
    #[JsonProperty('last_error')]
    public ?SetupIntentError $lastError;

    /**
     * @var ?value-of<SetupIntentCancellationReason> $cancellationReason Reason for cancellation if canceled
     */
    #[JsonProperty('cancellation_reason')]
    public ?string $cancellationReason;

    /**
     * @var ?string $description Merchant description for reference
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var array<string, mixed> $metadata Custom metadata attached to the setup intent
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public array $metadata;

    /**
     * @var ?DateTime $confirmedAt When the setup intent was confirmed
     */
    #[JsonProperty('confirmed_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $confirmedAt;

    /**
     * @var ?DateTime $canceledAt When the setup intent was canceled
     */
    #[JsonProperty('canceled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var DateTime $createdAt When the setup intent was created
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the setup intent was last updated
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   object: value-of<SetupIntentObject>,
     *   publicId: string,
     *   status: value-of<SetupIntentStatus>,
     *   paymentMethodTypes: array<string>,
     *   usage: value-of<SetupIntentUsage>,
     *   clientSecret: string,
     *   gateway: string,
     *   metadata: array<string, mixed>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   customerId?: ?string,
     *   paymentMethodId?: ?string,
     *   nextAction?: ?SetupIntentNextAction,
     *   lastError?: ?SetupIntentError,
     *   cancellationReason?: ?value-of<SetupIntentCancellationReason>,
     *   description?: ?string,
     *   confirmedAt?: ?DateTime,
     *   canceledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->object = $values['object'];
        $this->publicId = $values['publicId'];
        $this->status = $values['status'];
        $this->customerId = $values['customerId'] ?? null;
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->paymentMethodTypes = $values['paymentMethodTypes'];
        $this->usage = $values['usage'];
        $this->nextAction = $values['nextAction'] ?? null;
        $this->clientSecret = $values['clientSecret'];
        $this->gateway = $values['gateway'];
        $this->lastError = $values['lastError'] ?? null;
        $this->cancellationReason = $values['cancellationReason'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->metadata = $values['metadata'];
        $this->confirmedAt = $values['confirmedAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
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
