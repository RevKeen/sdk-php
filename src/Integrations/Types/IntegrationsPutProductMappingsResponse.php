<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsPutProductMappingsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   success: bool,
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
