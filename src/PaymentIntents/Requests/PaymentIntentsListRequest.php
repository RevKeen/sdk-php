<?php

namespace RevKeen\PaymentIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\PaymentIntents\Types\PaymentIntentsListRequestStatus;

class PaymentIntentsListRequest extends JsonSerializableType
{
    /**
     * @var ?string $customer Filter by customer ID
     */
    public ?string $customer;

    /**
     * @var ?value-of<PaymentIntentsListRequestStatus> $status Filter by status
     */
    public ?string $status;

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
     * @var ?string $startingAfter Cursor for pagination - return results after this ID (pi_xxx)
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination - return results before this ID (pi_xxx)
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customer?: ?string,
     *   status?: ?value-of<PaymentIntentsListRequestStatus>,
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
        $this->customer = $values['customer'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
