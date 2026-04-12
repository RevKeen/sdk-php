<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class CustomerListResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $id Unique customer identifier
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $merchantId ID of the merchant this customer belongs to
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var ?string $merchantRefId Merchant-assigned reference ID for external system mapping
     */
    #[JsonProperty('merchantRefId')]
    public ?string $merchantRefId;

    /**
     * @var string $email Customer's email address
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $name Customer's full name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone Customer's phone number
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $authUserId Linked Better Auth user ID for portal access
     */
    #[JsonProperty('authUserId')]
    public ?string $authUserId;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary key-value metadata attached to this customer
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $customFields Merchant-defined custom fields displayed as columns in the dashboard
     */
    #[JsonProperty('customFields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @var DateTime $createdAt When the customer was created (ISO 8601)
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt When the customer was last updated (ISO 8601)
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   merchantId: string,
     *   email: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   merchantRefId?: ?string,
     *   name?: ?string,
     *   phone?: ?string,
     *   authUserId?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   customFields?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->merchantRefId = $values['merchantRefId'] ?? null;
        $this->email = $values['email'];
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->authUserId = $values['authUserId'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
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
