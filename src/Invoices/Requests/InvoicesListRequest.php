<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class InvoicesListRequest extends JsonSerializableType
{
    /**
     * @var ?string $status Filter by invoice status
     */
    public ?string $status;

    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of results to skip
     */
    public ?int $offset;

    /**
     * @param array{
     *   status?: ?string,
     *   customerId?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
