<?php

namespace RevKeen\Businesses\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class GetBusinessesRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer UUID
     */
    public ?string $customerId;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @param array{
     *   customerId?: ?string,
     *   page?: ?int,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
