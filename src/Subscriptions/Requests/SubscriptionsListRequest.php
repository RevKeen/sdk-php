<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Subscriptions\Types\SubscriptionsListRequestStatus;

class SubscriptionsListRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?value-of<SubscriptionsListRequestStatus> $status Filter by subscription status
     */
    public ?string $status;

    /**
     * @var ?string $customerId Filter by customer UUID
     */
    public ?string $customerId;

    /**
     * @param array{
     *   page?: ?int,
     *   limit?: ?int,
     *   status?: ?value-of<SubscriptionsListRequestStatus>,
     *   customerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
    }
}
