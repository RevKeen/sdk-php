<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single transaction object.
 */
class TransactionRetrieveResponse extends JsonSerializableType
{
    /**
     * @var Transaction $data
     */
    #[JsonProperty('data')]
    public Transaction $data;

    /**
     * @param array{
     *   data: Transaction,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
