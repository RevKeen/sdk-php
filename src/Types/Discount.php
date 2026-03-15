<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class Discount extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $discountType
     */
    #[JsonProperty('discount_type')]
    public string $discountType;

    /**
     * @var float $discountValue Amount off (cents) or percentage
     */
    #[JsonProperty('discount_value')]
    public float $discountValue;

    /**
     * @var ?string $appliesTo
     */
    #[JsonProperty('applies_to')]
    public ?string $appliesTo;

    /**
     * @var ?array<string> $productIds
     */
    #[JsonProperty('product_ids'), ArrayType(['string'])]
    public ?array $productIds;

    /**
     * @var ?float $maxRedemptions
     */
    #[JsonProperty('max_redemptions')]
    public ?float $maxRedemptions;

    /**
     * @var ?float $currentRedemptions
     */
    #[JsonProperty('current_redemptions')]
    public ?float $currentRedemptions;

    /**
     * @var ?string $validFrom
     */
    #[JsonProperty('valid_from')]
    public ?string $validFrom;

    /**
     * @var ?string $validUntil
     */
    #[JsonProperty('valid_until')]
    public ?string $validUntil;

    /**
     * @var ?string $recurringType
     */
    #[JsonProperty('recurring_type')]
    public ?string $recurringType;

    /**
     * @var ?float $recurringCycles
     */
    #[JsonProperty('recurring_cycles')]
    public ?float $recurringCycles;

    /**
     * @var ?bool $firstTimeCustomer
     */
    #[JsonProperty('first_time_customer')]
    public ?bool $firstTimeCustomer;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    public ?string $createdAt;

    /**
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public ?string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   code: string,
     *   discountType: string,
     *   discountValue: float,
     *   name?: ?string,
     *   description?: ?string,
     *   appliesTo?: ?string,
     *   productIds?: ?array<string>,
     *   maxRedemptions?: ?float,
     *   currentRedemptions?: ?float,
     *   validFrom?: ?string,
     *   validUntil?: ?string,
     *   recurringType?: ?string,
     *   recurringCycles?: ?float,
     *   firstTimeCustomer?: ?bool,
     *   isActive?: ?bool,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->code = $values['code'];
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->discountType = $values['discountType'];
        $this->discountValue = $values['discountValue'];
        $this->appliesTo = $values['appliesTo'] ?? null;
        $this->productIds = $values['productIds'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->currentRedemptions = $values['currentRedemptions'] ?? null;
        $this->validFrom = $values['validFrom'] ?? null;
        $this->validUntil = $values['validUntil'] ?? null;
        $this->recurringType = $values['recurringType'] ?? null;
        $this->recurringCycles = $values['recurringCycles'] ?? null;
        $this->firstTimeCustomer = $values['firstTimeCustomer'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
