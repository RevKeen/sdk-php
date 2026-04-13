<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

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
     * @var ?array<string> $allowedMethods
     */
    #[JsonProperty('allowedMethods'), ArrayType(['string'])]
    public ?array $allowedMethods;

    /**
     * @var ?string $selectedMethod
     */
    #[JsonProperty('selectedMethod')]
    public ?string $selectedMethod;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   publicToken: string,
     *   currency: string,
     *   expiresAt: string,
     *   amountMinor?: ?float,
     *   customerId?: ?string,
     *   allowedMethods?: ?array<string>,
     *   selectedMethod?: ?string,
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
        $this->allowedMethods = $values['allowedMethods'] ?? null;
        $this->selectedMethod = $values['selectedMethod'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
