<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CheckoutSessionCreateResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $publicToken
     */
    #[JsonProperty('publicToken')]
    public string $publicToken;

    /**
     * @var ?float $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public ?float $amountMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * @var string $expiresAt
     */
    #[JsonProperty('expiresAt')]
    public string $expiresAt;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   publicToken: string,
     *   currency: string,
     *   expiresAt: string,
     *   amountMinor?: ?float,
     *   customerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->publicToken = $values['publicToken'];
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->currency = $values['currency'];
        $this->customerId = $values['customerId'] ?? null;
        $this->expiresAt = $values['expiresAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
