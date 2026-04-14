<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class AnalyticsCustomersGetLtvRequest extends JsonSerializableType
{
    /**
     * @var ?float $topN Number of top customers to return (1-100)
     */
    public ?float $topN;

    /**
     * @param array{
     *   topN?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->topN = $values['topN'] ?? null;
    }
}
