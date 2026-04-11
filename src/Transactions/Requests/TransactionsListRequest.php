<?php

namespace RevKeen\Transactions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Transactions\Types\TransactionsListRequestType;
use RevKeen\Transactions\Types\TransactionsListRequestStatus;

class TransactionsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<TransactionsListRequestType> $type Filter by transaction type
     */
    public ?string $type;

    /**
     * @var ?value-of<TransactionsListRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?string $invoiceId Filter by invoice ID
     */
    public ?string $invoiceId;

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
     *   type?: ?value-of<TransactionsListRequestType>,
     *   status?: ?value-of<TransactionsListRequestStatus>,
     *   customerId?: ?string,
     *   invoiceId?: ?string,
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
        $this->status = $values['status'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
