<?php

namespace RevKeen\Orders\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Orders\Types\OrdersListRequestStatus;
use RevKeen\Orders\Types\OrdersListRequestBillingType;

class OrdersListRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<OrdersListRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?value-of<OrdersListRequestBillingType> $billingType Filter by billing type
     */
    public ?string $billingType;

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
     * @var ?string $startingAfter Cursor for pagination - return results after this ID
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination - return results before this ID
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customerId?: ?string,
     *   status?: ?value-of<OrdersListRequestStatus>,
     *   billingType?: ?value-of<OrdersListRequestBillingType>,
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
        $this->customerId = $values['customerId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->billingType = $values['billingType'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
