<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class UsageEventListResponse extends JsonSerializableType
{
    /**
     * @var value-of<UsageEventListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<array<string, mixed>> $data Array of usage event objects
     */
    #[JsonProperty('data'), ArrayType([['string' => 'mixed']])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @param array{
     *   object: value-of<UsageEventListResponseObject>,
     *   data: array<array<string, mixed>>,
     *   hasMore: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
