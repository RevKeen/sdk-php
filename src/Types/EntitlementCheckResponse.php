<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class EntitlementCheckResponse extends JsonSerializableType
{
    /**
     * @var EntitlementCheck $data
     */
    #[JsonProperty('data')]
    public EntitlementCheck $data;

    /**
     * @param array{
     *   data: EntitlementCheck,
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
