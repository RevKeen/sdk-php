<?php

namespace RevKeen\Subscriptions\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class SubscriptionItemsListRequest extends JsonSerializableType
{
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
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
