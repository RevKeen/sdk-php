<?php

namespace RevKeen\Integrations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsActivateResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var IntegrationsActivateResponseData $data
     */
    #[JsonProperty('data')]
    public IntegrationsActivateResponseData $data;

    /**
     * @param array{
     *   success: bool,
     *   data: IntegrationsActivateResponseData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
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
