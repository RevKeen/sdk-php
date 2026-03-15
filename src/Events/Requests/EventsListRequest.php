<?php

namespace RevKeen\Events\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class EventsListRequest extends JsonSerializableType
{
    /**
     * @var ?string $type Filter by event type (e.g., invoice.paid)
     */
    public ?string $type;

    /**
     * @var ?string $types Filter by multiple event types (comma-separated)
     */
    public ?string $types;

    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?string $invoiceId Filter by invoice ID
     */
    public ?string $invoiceId;

    /**
     * @var ?string $subscriptionId Filter by subscription ID
     */
    public ?string $subscriptionId;

    /**
     * @var ?string $orderId Filter by order ID
     */
    public ?string $orderId;

    /**
     * @var ?float $createdGte Filter by created_at >= (Unix timestamp)
     */
    public ?float $createdGte;

    /**
     * @var ?float $createdLte Filter by created_at <= (Unix timestamp)
     */
    public ?float $createdLte;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination - return results after this event ID
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination - return results before this event ID
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   type?: ?string,
     *   types?: ?string,
     *   customerId?: ?string,
     *   invoiceId?: ?string,
     *   subscriptionId?: ?string,
     *   orderId?: ?string,
     *   createdGte?: ?float,
     *   createdLte?: ?float,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->types = $values['types'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
