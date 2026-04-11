<?php

namespace RevKeen\Voids\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Voids\Types\VoidsListRequestStatus;

class VoidsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<VoidsListRequestStatus> $status Filter by void status
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
     * @var ?string $createdAfter ISO 8601 date - only voids created after this date
     */
    public ?string $createdAfter;

    /**
     * @var ?string $createdBefore ISO 8601 date - only voids created before this date
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
     *   status?: ?value-of<VoidsListRequestStatus>,
     *   paymentId?: ?string,
     *   gateway?: ?string,
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
        $this->createdAfter = $values['createdAfter'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
