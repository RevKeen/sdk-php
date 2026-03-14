<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Redirect details for 3DS authentication
 */
class SetupIntentNextActionRedirectToUrl extends JsonSerializableType
{
    /**
     * @var string $url The URL to redirect the customer to
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $returnUrl The URL to redirect back to after completion
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
