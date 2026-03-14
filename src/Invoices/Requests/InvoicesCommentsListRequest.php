<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class InvoicesCommentsListRequest extends JsonSerializableType
{
    /**
     * @var ?string $includeInternal Set to 'true' to include internal comments (merchant-only)
     */
    public ?string $includeInternal;

    /**
     * @param array{
     *   includeInternal?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeInternal = $values['includeInternal'] ?? null;
    }
}
