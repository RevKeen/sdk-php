<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

/**
 * A paginated list of events matching the query filters.
 */
class EventListResponse extends JsonSerializableType
{
    /**
     * @var value-of<EventListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<Event> $data
     */
    #[JsonProperty('data'), ArrayType([Event::class])]
    public array $data;

    /**
     * @var bool $hasMore
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @var string $url The URL for accessing this list
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   object: value-of<EventListResponseObject>,
     *   data: array<Event>,
     *   hasMore: bool,
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
