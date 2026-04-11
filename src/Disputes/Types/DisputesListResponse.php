<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Types\Dispute;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class DisputesListResponse extends JsonSerializableType
{
    /**
     * @var array<Dispute> $data
     */
    #[JsonProperty('data'), ArrayType([Dispute::class])]
    public array $data;

    /**
     * @var DisputesListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public DisputesListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<Dispute>,
     *   meta: DisputesListResponseMeta,
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
