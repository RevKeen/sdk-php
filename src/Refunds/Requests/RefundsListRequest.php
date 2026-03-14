<?php

namespace RevKeen\Refunds\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Refunds\Types\RefundsListRequestStatus;
use RevKeen\Refunds\Types\RefundsListRequestReason;

class RefundsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<RefundsListRequestStatus> $status Filter by refund status
     */
    public ?string $status;

    /**
     * @var ?string $paymentId Filter by original payment ID
     */
    public ?string $paymentId;

    /**
     * @var ?string $gateway Filter by payment gateway (nmi, stripe, etc.)
     */
    public ?string $gateway;

    /**
     * @var ?value-of<RefundsListRequestReason> $reason Filter by refund reason
     */
    public ?string $reason;

    /**
     * @var ?string $createdAfter ISO 8601 date - only refunds created after this date
     */
    public ?string $createdAfter;

    /**
     * @var ?string $createdBefore ISO 8601 date - only refunds created before this date
     */
    public ?string $createdBefore;

    /**
     * @var ?float $limit Number of results to return (1-100)
     */
    public ?float $limit;

    /**
     * @var ?float $offset Number of results to skip
     */
    public ?float $offset;

    /**
     * @param array{
     *   status?: ?value-of<RefundsListRequestStatus>,
     *   paymentId?: ?string,
     *   gateway?: ?string,
     *   reason?: ?value-of<RefundsListRequestReason>,
     *   createdAfter?: ?string,
     *   createdBefore?: ?string,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->createdAfter = $values['createdAfter'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
