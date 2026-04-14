<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of voids matching the query filters.
 */
class VoidListResponse extends JsonSerializableType
{
    /**
     * @var array<Void> $data
     */
    #[JsonProperty('data'), ArrayType([Void::class])]
    public array $data;

    /**
     * @var VoidListResponseMeta $meta
     */
    #[JsonProperty('meta')]
    public VoidListResponseMeta $meta;

    /**
     * @param array{
     *   data: array<Void>,
     *   meta: VoidListResponseMeta,
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
