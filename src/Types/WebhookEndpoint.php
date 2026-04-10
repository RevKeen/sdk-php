<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class WebhookEndpoint extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var array<string> $enabledEvents
     */
    #[JsonProperty('enabled_events'), ArrayType(['string'])]
    public array $enabledEvents;

    /**
     * @var value-of<WebhookEndpointStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $secret Signing secret. Returned only on create or secret rotation.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var value-of<WebhookEndpointCircuitBreakerState> $circuitBreakerState
     */
    #[JsonProperty('circuit_breaker_state')]
    public string $circuitBreakerState;

    /**
     * @var float $totalDeliveries
     */
    #[JsonProperty('total_deliveries')]
    public float $totalDeliveries;

    /**
     * @var float $successfulDeliveries
     */
    #[JsonProperty('successful_deliveries')]
    public float $successfulDeliveries;

    /**
     * @var float $failedDeliveries
     */
    #[JsonProperty('failed_deliveries')]
    public float $failedDeliveries;

    /**
     * @var ?string $lastDeliveryAt
     */
    #[JsonProperty('last_delivery_at')]
    public ?string $lastDeliveryAt;

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
     *   url: string,
     *   enabledEvents: array<string>,
     *   status: value-of<WebhookEndpointStatus>,
     *   circuitBreakerState: value-of<WebhookEndpointCircuitBreakerState>,
     *   totalDeliveries: float,
     *   successfulDeliveries: float,
     *   failedDeliveries: float,
     *   createdAt: string,
     *   updatedAt: string,
     *   description?: ?string,
     *   secret?: ?string,
     *   lastDeliveryAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->description = $values['description'] ?? null;
        $this->enabledEvents = $values['enabledEvents'];
        $this->status = $values['status'];
        $this->secret = $values['secret'] ?? null;
        $this->circuitBreakerState = $values['circuitBreakerState'];
        $this->totalDeliveries = $values['totalDeliveries'];
        $this->successfulDeliveries = $values['successfulDeliveries'];
        $this->failedDeliveries = $values['failedDeliveries'];
        $this->lastDeliveryAt = $values['lastDeliveryAt'] ?? null;
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
