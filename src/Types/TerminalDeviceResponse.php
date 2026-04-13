<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A single terminal device with connection status and configuration details.
 */
class TerminalDeviceResponse extends JsonSerializableType
{
    /**
     * @var TerminalDevice $data
     */
    #[JsonProperty('data')]
    public TerminalDevice $data;

    /**
     * @param array{
     *   data: TerminalDevice,
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
