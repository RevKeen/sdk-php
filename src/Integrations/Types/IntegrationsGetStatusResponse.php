<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsGetStatusResponse extends JsonSerializableType
{
    /**
     * @var ?IntegrationsGetStatusResponseData $data
     */
    #[JsonProperty('data')]
    public ?IntegrationsGetStatusResponseData $data;

    /**
     * @param array{
     *   data?: ?IntegrationsGetStatusResponseData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
