<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UsageEvent extends JsonSerializableType
{
    /**
     * @var string $name Event name matching a meter's event_name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $customerId RevKeen customer ID
     */
    #[JsonProperty('customer_id')]
    public ?string $customerId;

    /**
     * @var ?string $externalCustomerId Your external customer identifier
     */
    #[JsonProperty('external_customer_id')]
    public ?string $externalCustomerId;

    /**
     * @var ?string $subscriptionId Subscription ID to attribute usage to
     */
    #[JsonProperty('subscription_id')]
    public ?string $subscriptionId;

    /**
     * @var ?string $meterId Direct meter ID (alternative to event name matching)
     */
    #[JsonProperty('meter_id')]
    public ?string $meterId;

    /**
     * @var ?float $quantity Event quantity (default: 1)
     */
    #[JsonProperty('quantity')]
    public ?float $quantity;

    /**
     * @var ?string $timestamp ISO 8601 timestamp (default: now)
     */
    #[JsonProperty('timestamp')]
    public ?string $timestamp;

    /**
     * @var ?string $idempotencyKey Unique key for deduplication
     */
    #[JsonProperty('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * @var ?array<string, mixed> $metadata Arbitrary properties for filtering and aggregation
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   name: string,
     *   customerId?: ?string,
     *   externalCustomerId?: ?string,
     *   subscriptionId?: ?string,
     *   meterId?: ?string,
     *   quantity?: ?float,
     *   timestamp?: ?string,
     *   idempotencyKey?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->customerId = $values['customerId'] ?? null;
        $this->externalCustomerId = $values['externalCustomerId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->meterId = $values['meterId'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
