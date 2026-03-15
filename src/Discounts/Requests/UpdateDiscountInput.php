<?php

namespace RevKeen\Discounts\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Discounts\Types\UpdateDiscountInputAppliesTo;
use RevKeen\Discounts\Types\UpdateDiscountInputScope;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Discounts\Types\UpdateDiscountInputRecurringType;

class UpdateDiscountInput extends JsonSerializableType
{
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
     * @var ?float $discountValue
     */
    #[JsonProperty('discount_value')]
    public ?float $discountValue;

    /**
     * @var ?value-of<UpdateDiscountInputAppliesTo> $appliesTo
     */
    #[JsonProperty('applies_to')]
    public ?string $appliesTo;

    /**
     * @var ?value-of<UpdateDiscountInputScope> $scope
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?array<string> $productIds
     */
    #[JsonProperty('product_ids'), ArrayType(['string'])]
    public ?array $productIds;

    /**
     * @var ?int $maxRedemptions
     */
    #[JsonProperty('max_redemptions')]
    public ?int $maxRedemptions;

    /**
     * @var ?int $maxRedemptionsPerUser
     */
    #[JsonProperty('max_redemptions_per_user')]
    public ?int $maxRedemptionsPerUser;

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
     * @var ?bool $isActive
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?bool $isArchived
     */
    #[JsonProperty('is_archived')]
    public ?bool $isArchived;

    /**
     * @var ?value-of<UpdateDiscountInputRecurringType> $recurringType
     */
    #[JsonProperty('recurring_type')]
    public ?string $recurringType;

    /**
     * @var ?int $recurringCycles
     */
    #[JsonProperty('recurring_cycles')]
    public ?int $recurringCycles;

    /**
     * @var ?bool $firstTimeCustomer
     */
    #[JsonProperty('first_time_customer')]
    public ?bool $firstTimeCustomer;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   discountValue?: ?float,
     *   appliesTo?: ?value-of<UpdateDiscountInputAppliesTo>,
     *   scope?: ?value-of<UpdateDiscountInputScope>,
     *   productIds?: ?array<string>,
     *   maxRedemptions?: ?int,
     *   maxRedemptionsPerUser?: ?int,
     *   validFrom?: ?string,
     *   validUntil?: ?string,
     *   isActive?: ?bool,
     *   isArchived?: ?bool,
     *   recurringType?: ?value-of<UpdateDiscountInputRecurringType>,
     *   recurringCycles?: ?int,
     *   firstTimeCustomer?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->discountValue = $values['discountValue'] ?? null;
        $this->appliesTo = $values['appliesTo'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->productIds = $values['productIds'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->maxRedemptionsPerUser = $values['maxRedemptionsPerUser'] ?? null;
        $this->validFrom = $values['validFrom'] ?? null;
        $this->validUntil = $values['validUntil'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->isArchived = $values['isArchived'] ?? null;
        $this->recurringType = $values['recurringType'] ?? null;
        $this->recurringCycles = $values['recurringCycles'] ?? null;
        $this->firstTimeCustomer = $values['firstTimeCustomer'] ?? null;
    }
}
