<?php

namespace RevKeen\Meters\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class ListMetersRequest extends JsonSerializableType
{
    /**
     * @var ?string $includeArchived Include archived meters
     */
    public ?string $includeArchived;

    /**
     * @var ?string $limit Max results (default 50, max 100)
     */
    public ?string $limit;

    /**
     * @var ?string $offset Pagination offset
     */
    public ?string $offset;

    /**
     * @param array{
     *   includeArchived?: ?string,
     *   limit?: ?string,
     *   offset?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeArchived = $values['includeArchived'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
