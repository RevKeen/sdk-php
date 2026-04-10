<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DisputesRetrieveResponse extends JsonSerializableType
{
    /**
     * @var DisputesRetrieveResponseData $data A dispute (chargeback) represents a customer's challenge to a charge with their card issuer. Track lifecycle stages and submit evidence to contest.
     */
    #[JsonProperty('data')]
    public DisputesRetrieveResponseData $data;

    /**
     * @param array{
     *   data: DisputesRetrieveResponseData,
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
