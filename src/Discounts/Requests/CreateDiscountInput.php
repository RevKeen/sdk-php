<?php

namespace RevKeen\Discounts\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Discounts\Types\CreateDiscountInputDiscountType;
use RevKeen\Discounts\Types\CreateDiscountInputAppliesTo;
use RevKeen\Discounts\Types\CreateDiscountInputScope;
use RevKeen\Core\Types\ArrayType;
use RevKeen\Discounts\Types\CreateDiscountInputRecurringType;

class CreateDiscountInput extends JsonSerializableType
{
    /**
     * @var string $code Unique discount code (will be uppercased)
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $name Human-readable name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description Optional description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var value-of<CreateDiscountInputDiscountType> $discountType Type of discount
     */
    #[JsonProperty('discount_type')]
    public string $discountType;

    /**
     * @var float $discountValue Discount value - percentage (1-100) or amount in cents
     */
    #[JsonProperty('discount_value')]
    public float $discountValue;

    /**
     * @var ?value-of<CreateDiscountInputAppliesTo> $appliesTo Which products the discount applies to
     */
    #[JsonProperty('applies_to')]
    public ?string $appliesTo;

    /**
     * @var ?value-of<CreateDiscountInputScope> $scope Scope of where discount can be applied
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @var ?array<string> $productIds Product IDs if applies_to is 'specific_products'
     */
    #[JsonProperty('product_ids'), ArrayType(['string'])]
    public ?array $productIds;

    /**
     * @var ?int $maxRedemptions Maximum total redemptions allowed
     */
    #[JsonProperty('max_redemptions')]
    public ?int $maxRedemptions;

    /**
     * @var ?int $maxRedemptionsPerUser Maximum redemptions per customer (0 = unlimited)
     */
    #[JsonProperty('max_redemptions_per_user')]
    public ?int $maxRedemptionsPerUser;

    /**
     * @var ?string $validFrom Start date (ISO 8601)
     */
    #[JsonProperty('valid_from')]
    public ?string $validFrom;

    /**
     * @var ?string $validUntil End date (ISO 8601)
     */
    #[JsonProperty('valid_until')]
    public ?string $validUntil;

    /**
     * @var ?value-of<CreateDiscountInputRecurringType> $recurringType How the discount applies to recurring payments
     */
    #[JsonProperty('recurring_type')]
    public ?string $recurringType;

    /**
     * @var ?int $recurringCycles Number of billing cycles (only if recurring_type is 'repeating')
     */
    #[JsonProperty('recurring_cycles')]
    public ?int $recurringCycles;

    /**
     * @var ?bool $firstTimeCustomer Only available to first-time customers
     */
    #[JsonProperty('first_time_customer')]
    public ?bool $firstTimeCustomer;

    /**
     * @param array{
     *   code: string,
     *   name: string,
     *   discountType: value-of<CreateDiscountInputDiscountType>,
     *   discountValue: float,
     *   description?: ?string,
     *   appliesTo?: ?value-of<CreateDiscountInputAppliesTo>,
     *   scope?: ?value-of<CreateDiscountInputScope>,
     *   productIds?: ?array<string>,
     *   maxRedemptions?: ?int,
     *   maxRedemptionsPerUser?: ?int,
     *   validFrom?: ?string,
     *   validUntil?: ?string,
     *   recurringType?: ?value-of<CreateDiscountInputRecurringType>,
     *   recurringCycles?: ?int,
     *   firstTimeCustomer?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->discountType = $values['discountType'];
        $this->discountValue = $values['discountValue'];
        $this->appliesTo = $values['appliesTo'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->productIds = $values['productIds'] ?? null;
        $this->maxRedemptions = $values['maxRedemptions'] ?? null;
        $this->maxRedemptionsPerUser = $values['maxRedemptionsPerUser'] ?? null;
        $this->validFrom = $values['validFrom'] ?? null;
        $this->validUntil = $values['validUntil'] ?? null;
        $this->recurringType = $values['recurringType'] ?? null;
        $this->recurringCycles = $values['recurringCycles'] ?? null;
        $this->firstTimeCustomer = $values['firstTimeCustomer'] ?? null;
    }
}
