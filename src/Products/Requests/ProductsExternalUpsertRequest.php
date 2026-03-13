<?php

namespace RevKeen\Products\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Products\Types\ProductsExternalUpsertRequestKind;
use RevKeen\Products\Types\ProductsExternalUpsertRequestInterval;
use DateTime;
use RevKeen\Core\Types\Date;
use RevKeen\Core\Types\ArrayType;

class ProductsExternalUpsertRequest extends JsonSerializableType
{
    /**
     * @var ?string $merchantId Deprecated: merchantId is derived from API key authentication. This field is ignored.
     */
    #[JsonProperty('merchantId')]
    public ?string $merchantId;

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
     * @var ?value-of<ProductsExternalUpsertRequestKind> $kind Product kind - subscription or one-time
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var int $amountCents Price in minor units (cents)
     */
    #[JsonProperty('amountCents')]
    public int $amountCents;

    /**
     * @var ?string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $isActive Whether the product is active
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?value-of<ProductsExternalUpsertRequestInterval> $interval Billing interval for subscriptions
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?int $intervalCount Number of intervals between billings
     */
    #[JsonProperty('intervalCount')]
    public ?int $intervalCount;

    /**
     * @var ?DateTime $externalUpdatedAt External system's last update timestamp for stale update protection
     */
    #[JsonProperty('externalUpdatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $externalUpdatedAt;

    /**
     * @var ?string $externalRef Additional external reference (e.g., membership ID)
     */
    #[JsonProperty('externalRef')]
    public ?string $externalRef;

    /**
     * @var ?array<string, mixed> $metadata Additional metadata from external system
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name: string,
     *   amountCents: int,
     *   merchantId?: ?string,
     *   description?: ?string,
     *   kind?: ?value-of<ProductsExternalUpsertRequestKind>,
     *   currency?: ?string,
     *   isActive?: ?bool,
     *   interval?: ?value-of<ProductsExternalUpsertRequestInterval>,
     *   intervalCount?: ?int,
     *   externalUpdatedAt?: ?DateTime,
     *   externalRef?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->merchantId = $values['merchantId'] ?? null;
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
}
