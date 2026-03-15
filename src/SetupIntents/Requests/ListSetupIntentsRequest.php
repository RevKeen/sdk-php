<?php

namespace RevKeen\SetupIntents\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\SetupIntents\Types\ListSetupIntentsRequestStatus;

class ListSetupIntentsRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<ListSetupIntentsRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?int $limit Maximum number of results to return
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination (setup intent ID)
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination (setup intent ID)
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customerId?: ?string,
     *   status?: ?value-of<ListSetupIntentsRequestStatus>,
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
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
