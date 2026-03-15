<?php

namespace RevKeen\Products\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

class ProductsExternalBatchRequestProductsItem extends JsonSerializableType
{
    /**
     * @var string $externalId External system's product ID
     */
    #[JsonProperty('external_id')]
    public string $externalId;

    /**
     * @var string $name Product name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description Product description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<ProductsExternalBatchRequestProductsItemKind> $kind Product kind - subscription or one-time
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var int $amountCents Price in minor units (cents)
     */
    #[JsonProperty('amount_cents')]
    public int $amountCents;

    /**
     * @var ?string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $isActive Whether the product is active
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?value-of<ProductsExternalBatchRequestProductsItemInterval> $interval Billing interval for subscriptions
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount Number of intervals between billings
     */
    #[JsonProperty('interval_count')]
    public ?int $intervalCount;

    /**
     * @var ?DateTime $externalUpdatedAt External system's last update timestamp for stale update protection
     */
    #[JsonProperty('external_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @var ?string $externalRef Additional external reference (e.g., membership ID)
     */
    #[JsonProperty('external_ref')]
    public ?string $externalRef;

    /**
     * @var ?array<string, mixed> $metadata Additional metadata from external system
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   externalId: string,
     *   name: string,
     *   amountCents: int,
     *   description?: ?string,
     *   kind?: ?value-of<ProductsExternalBatchRequestProductsItemKind>,
     *   currency?: ?string,
     *   isActive?: ?bool,
     *   interval?: ?value-of<ProductsExternalBatchRequestProductsItemInterval>,
     *   intervalCount?: ?int,
     *   externalUpdatedAt?: ?DateTime,
     *   externalRef?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->amountCents = $values['amountCents'];
        $this->currency = $values['currency'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
        $this->externalUpdatedAt = $values['externalUpdatedAt'] ?? null;
        $this->externalRef = $values['externalRef'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
