<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Present when type is redirect_to_url
 */
class PaymentIntentNextActionRedirectToUrl extends JsonSerializableType
{
    /**
     * @var string $url URL to redirect customer for 3DS authentication
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $returnUrl URL to return to after 3DS
     */
    #[JsonProperty('return_url')]
    public string $returnUrl;

    /**
     * @param array{
     *   url: string,
     *   returnUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->returnUrl = $values['returnUrl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
