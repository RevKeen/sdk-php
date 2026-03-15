<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\OpenDispute;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class DisputesGetOpenResponse extends JsonSerializableType
{
    /**
     * @var array<OpenDispute> $data
     */
    #[JsonProperty('data'), ArrayType([OpenDispute::class])]
    public array $data;

    /**
     * @var DisputesGetOpenResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public DisputesGetOpenResponseMeta $meta;

    /**
     * @param array{
     *   data: array<OpenDispute>,
     *   meta: DisputesGetOpenResponseMeta,
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
