<?php

namespace RevKeen\Discounts\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Discounts\Types\DiscountsListRequestIsActive;
use RevKeen\Discounts\Types\DiscountsListRequestIsArchived;

class DiscountsListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<DiscountsListRequestIsActive> $isActive Filter by active status
     */
    public ?string $isActive;

    /**
     * @var ?value-of<DiscountsListRequestIsArchived> $isArchived Filter by archived status
     */
    public ?string $isArchived;

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
     *   isActive?: ?value-of<DiscountsListRequestIsActive>,
     *   isArchived?: ?value-of<DiscountsListRequestIsArchived>,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isActive = $values['isActive'] ?? null;
        $this->isArchived = $values['isArchived'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
