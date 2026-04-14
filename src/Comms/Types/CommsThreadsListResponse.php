<?php

namespace RevKeen\Comms\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CommsThreadsListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $threads Thread objects
     */
    #[JsonProperty('threads'), ArrayType([['string' => 'mixed']])]
    public array $threads;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $limit
     */
    #[JsonProperty('limit')]
    public float $limit;

    /**
     * @var float $offset
     */
    #[JsonProperty('offset')]
    public float $offset;

    /**
     * @param array{
     *   threads: array<array<string, mixed>>,
     *   total: float,
     *   limit: float,
     *   offset: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->threads = $values['threads'];
        $this->total = $values['total'];
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
