<?php

namespace RevKeen\SubscriptionSchedules\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\SubscriptionSchedules\Types\SubscriptionSchedulesListRequestStatus;

class SubscriptionSchedulesListRequest extends JsonSerializableType
{
    /**
     * @var ?string $customer Filter by customer ID
     */
    public ?string $customer;

    /**
     * @var ?string $subscription Filter by subscription ID
     */
    public ?string $subscription;

    /**
     * @var ?value-of<SubscriptionSchedulesListRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?float $scheduledGte Start date >= (Unix timestamp)
     */
    public ?float $scheduledGte;

    /**
     * @var ?float $scheduledLte Start date <= (Unix timestamp)
     */
    public ?float $scheduledLte;

    /**
     * @var ?int $limit Max results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor - return results after this ID
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor - return results before this ID
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customer?: ?string,
     *   subscription?: ?string,
     *   status?: ?value-of<SubscriptionSchedulesListRequestStatus>,
     *   scheduledGte?: ?float,
     *   scheduledLte?: ?float,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customer = $values['customer'] ?? null;
        $this->subscription = $values['subscription'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->scheduledGte = $values['scheduledGte'] ?? null;
        $this->scheduledLte = $values['scheduledLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
