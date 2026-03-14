<?php

namespace RevKeen\Comms\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Comms\Types\CommsThreadsListRequestStatus;

class CommsThreadsListRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer UUID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<CommsThreadsListRequestStatus> $status Filter by thread status
     */
    public ?string $status;

    /**
     * @var ?string $channel Filter by channel
     */
    public ?string $channel;

    /**
     * @var ?string $invoiceId Filter by related invoice UUID
     */
    public ?string $invoiceId;

    /**
     * @var ?float $limit Maximum number of results (1-100)
     */
    public ?float $limit;

    /**
     * @var ?float $offset Number of results to skip
     */
    public ?float $offset;

    /**
     * @param array{
     *   customerId?: ?string,
     *   status?: ?value-of<CommsThreadsListRequestStatus>,
     *   channel?: ?string,
     *   invoiceId?: ?string,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
