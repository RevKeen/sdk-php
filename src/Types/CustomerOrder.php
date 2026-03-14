<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CustomerOrder extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $publicId
     */
    #[JsonProperty('public_id')]
    public string $publicId;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customer_id')]
    public string $customerId;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $totalMinor
     */
    #[JsonProperty('total_minor')]
    public int $totalMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $fulfilledAt
     */
    #[JsonProperty('fulfilled_at')]
    public ?string $fulfilledAt;

    /**
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    public ?string $canceledAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   customerId: string,
     *   status: string,
     *   totalMinor: int,
     *   currency: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   fulfilledAt?: ?string,
     *   canceledAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'];
        $this->customerId = $values['customerId'];
        $this->status = $values['status'];
        $this->totalMinor = $values['totalMinor'];
        $this->currency = $values['currency'];
        $this->fulfilledAt = $values['fulfilledAt'] ?? null;
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
