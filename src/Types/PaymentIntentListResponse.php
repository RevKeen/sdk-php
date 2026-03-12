<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PaymentIntentListResponse extends JsonSerializableType
{
    /**
     * @var value-of<PaymentIntentListResponseObject> $object
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<PaymentIntent> $data
     */
    #[JsonProperty('data'), ArrayType([PaymentIntent::class])]
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
     *   object: value-of<PaymentIntentListResponseObject>,
     *   data: array<PaymentIntent>,
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
