<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class DeclineAnalyticsResponseDataByGatewayValue extends JsonSerializableType
{
    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $approved
     */
    #[JsonProperty('approved')]
    public ?int $approved;

    /**
     * @var ?int $declined
     */
    #[JsonProperty('declined')]
    public ?int $declined;

    /**
     * @param array{
     *   total?: ?int,
     *   approved?: ?int,
     *   declined?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->total = $values['total'] ?? null;
        $this->approved = $values['approved'] ?? null;
        $this->declined = $values['declined'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
