<?php

namespace RevKeen\WebhookEndpoints\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\WebhookEndpoints\Types\WebhookEndpointsListRequestStatus;

class WebhookEndpointsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<WebhookEndpointsListRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @param array{
     *   status?: ?value-of<WebhookEndpointsListRequestStatus>,
     *   limit?: ?int,
     *   offset?: ?int,
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
