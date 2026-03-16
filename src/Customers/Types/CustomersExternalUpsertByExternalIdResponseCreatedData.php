<?php

namespace RevKeen\Customers\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;
use DateTime;
use RevKeen\Core\Types\Date;

class CustomersExternalUpsertByExternalIdResponseCreatedData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var ?string $merchantRefId
     */
    #[JsonProperty('merchantRefId')]
    public ?string $merchantRefId;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $authUserId
     */
    #[JsonProperty('authUserId')]
    public ?string $authUserId;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?array<string, mixed> $customFields Custom fields
     */
    #[JsonProperty('customFields'), ArrayType(['string' => 'mixed'])]
    public ?array $customFields;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
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
