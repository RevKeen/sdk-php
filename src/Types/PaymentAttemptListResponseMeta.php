<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PaymentAttemptListResponseMeta extends JsonSerializableType
{
    /**
     * @var int $count Number of results returned
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @var ?int $limit Limit used in query
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @param array{
     *   count: int,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'];
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
