<?php

namespace RevKeen\Comms\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class CommsMessagesListResponse extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $messages Message objects
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public array $messages;

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
     *   messages: array<array<string, mixed>>,
     *   total: float,
     *   limit: float,
     *   offset: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messages = $values['messages'];
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
