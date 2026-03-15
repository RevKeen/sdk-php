<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class SetupIntentList extends JsonSerializableType
{
    /**
     * @var value-of<SetupIntentListObject> $object Object type, always 'list'
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<SetupIntent> $data Array of setup intents
     */
    #[JsonProperty('data'), ArrayType([SetupIntent::class])]
    public array $data;

    /**
     * @var bool $hasMore Whether there are more results available
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @var int $totalCount Total count of matching setup intents
     */
    #[JsonProperty('total_count')]
    public int $totalCount;

    /**
     * @var string $url URL for this list resource
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   object: value-of<SetupIntentListObject>,
     *   data: array<SetupIntent>,
     *   hasMore: bool,
     *   totalCount: int,
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'];
        $this->data = $values['data'];
        $this->hasMore = $values['hasMore'];
        $this->totalCount = $values['totalCount'];
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
