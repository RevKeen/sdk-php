<?php

namespace RevKeen\Products\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class ProductsExternalUpsertResponseData extends JsonSerializableType
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
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?value-of<ProductsExternalUpsertResponseDataKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?float $amountCents
     */
    #[JsonProperty('amountCents')]
    public ?float $amountCents;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $externalSystem
     */
    #[JsonProperty('externalSystem')]
    public ?string $externalSystem;

    /**
     * @var ?string $externalRef
     */
    #[JsonProperty('externalRef')]
    public ?string $externalRef;

    /**
     * @var ?string $interval
     */
    #[JsonProperty('interval')]
    public ?string $interval;

    /**
     * @var ?float $intervalCount
     */
    #[JsonProperty('intervalCount')]
    public ?float $intervalCount;

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
     *   name: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   kind?: ?value-of<ProductsExternalUpsertResponseDataKind>,
     *   amountCents?: ?float,
     *   currency?: ?string,
     *   isActive?: ?bool,
     *   externalId?: ?string,
     *   externalSystem?: ?string,
     *   externalRef?: ?string,
     *   interval?: ?string,
     *   intervalCount?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->merchantId = $values['merchantId'];
        $this->name = $values['name'];
        $this->description = $values['description'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->amountCents = $values['amountCents'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->externalSystem = $values['externalSystem'] ?? null;
        $this->externalRef = $values['externalRef'] ?? null;
        $this->interval = $values['interval'] ?? null;
        $this->intervalCount = $values['intervalCount'] ?? null;
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
