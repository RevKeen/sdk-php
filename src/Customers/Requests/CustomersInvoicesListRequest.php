<?php

namespace RevKeen\Customers\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CustomersInvoicesListRequest extends JsonSerializableType
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
     * @param array{
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
