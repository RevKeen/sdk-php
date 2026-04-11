<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class EntitlementsListRequest extends JsonSerializableType
{
    /**
     * @var string $customerId Customer UUID (required)
     */
    public string $customerId;

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
     * @var ?int $limit Maximum results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?int $offset Results to skip
     */
    public ?int $offset;

    /**
     * @param array{
     *   customerId: string,
     *   includeExpired?: ?bool,
     *   benefitType?: ?string,
     *   category?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->includeExpired = $values['includeExpired'] ?? null;
        $this->benefitType = $values['benefitType'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
