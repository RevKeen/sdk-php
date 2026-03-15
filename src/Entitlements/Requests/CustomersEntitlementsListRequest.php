<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CustomersEntitlementsListRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeExpired Include expired entitlements
     */
    public ?bool $includeExpired;

    /**
     * @var ?string $benefitType Filter by benefit type
     */
    public ?string $benefitType;

    /**
     * @var ?string $category Filter by category
     */
    public ?string $category;

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
     *   includeExpired?: ?bool,
     *   benefitType?: ?string,
     *   category?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeExpired = $values['includeExpired'] ?? null;
        $this->benefitType = $values['benefitType'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
