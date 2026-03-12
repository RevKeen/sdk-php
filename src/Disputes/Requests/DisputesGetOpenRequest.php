<?php

namespace RevKeen\Disputes\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class DisputesGetOpenRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit Number of results to return
     */
    public ?float $limit;

    /**
     * @param array{
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
