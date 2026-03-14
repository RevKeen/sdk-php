<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Card details (if type is 'card')
 */
class CardDetails extends JsonSerializableType
{
    /**
     * @var ?value-of<CardDetailsBrand> $brand The card brand
     */
    #[JsonProperty('brand')]
    public ?string $brand;

    /**
     * @var ?string $last4 The last 4 digits of the card number
     */
    #[JsonProperty('last4')]
    public ?string $last4;

    /**
     * @var ?int $expMonth Expiration month (1-12)
     */
    #[JsonProperty('exp_month')]
    public ?int $expMonth;

    /**
     * @var ?int $expYear Expiration year
     */
    #[JsonProperty('exp_year')]
    public ?int $expYear;

    /**
     * @var ?value-of<CardDetailsFunding> $funding The card funding type
     */
    #[JsonProperty('funding')]
    public ?string $funding;

    /**
     * @param array{
     *   brand?: ?value-of<CardDetailsBrand>,
     *   last4?: ?string,
     *   expMonth?: ?int,
     *   expYear?: ?int,
     *   funding?: ?value-of<CardDetailsFunding>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->last4 = $values['last4'] ?? null;
        $this->expMonth = $values['expMonth'] ?? null;
        $this->expYear = $values['expYear'] ?? null;
        $this->funding = $values['funding'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
