<?php

namespace RevKeen\WebhookEndpoints\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\WebhookEndpoints\Types\WebhookEndpointsListRequestStatus;

class WebhookEndpointsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<WebhookEndpointsListRequestStatus> $status Filter by status
     */
    public ?string $status;

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
     *   status?: ?value-of<WebhookEndpointsListRequestStatus>,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
