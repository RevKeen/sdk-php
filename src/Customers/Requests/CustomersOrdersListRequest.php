<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Customers\Types\CustomersOrdersListRequestStatus;

class CustomersOrdersListRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of records to return (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination - return records after this ID
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination - return records before this ID
     */
    public ?string $endingBefore;

    /**
     * @var ?value-of<CustomersOrdersListRequestStatus> $status Filter by order status
     */
    public ?string $status;

    /**
     * @param array{
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     *   status?: ?value-of<CustomersOrdersListRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
