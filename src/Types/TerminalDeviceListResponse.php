<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class TerminalDeviceListResponse extends JsonSerializableType
{
    /**
     * @var array<TerminalDevice> $data
     */
    #[JsonProperty('data'), ArrayType([TerminalDevice::class])]
    public array $data;

    /**
     * @var TerminalDeviceListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public TerminalDeviceListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<TerminalDevice>,
     *   meta: TerminalDeviceListResponseMeta,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->meta = $values['meta'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
