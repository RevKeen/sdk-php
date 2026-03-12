<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PaymentMethodList extends JsonSerializableType
{
    /**
     * @var value-of<PaymentMethodListObject> $object Object type, always 'list'
     */
    #[JsonProperty('object')]
    public string $object;

    /**
     * @var array<PaymentMethod> $data Array of payment methods
     */
    #[JsonProperty('data'), ArrayType([PaymentMethod::class])]
    public array $data;

    /**
     * @var bool $hasMore Whether there are more results available
     */
    #[JsonProperty('has_more')]
    public bool $hasMore;

    /**
     * @var string $url URL for this list resource
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   object: value-of<PaymentMethodListObject>,
     *   data: array<PaymentMethod>,
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
