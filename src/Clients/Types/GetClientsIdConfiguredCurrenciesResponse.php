<?php

namespace RevKeen\Clients\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class GetClientsIdConfiguredCurrenciesResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<string> $currencies
     */
    #[JsonProperty('currencies'), ArrayType(['string'])]
    public array $currencies;

    /**
     * @var ?string $defaultCurrency
     */
    #[JsonProperty('default_currency')]
    public ?string $defaultCurrency;

    /**
     * @var array<GetClientsIdConfiguredCurrenciesResponseCurrencyDetailsItem> $currencyDetails
     */
    #[JsonProperty('currency_details'), ArrayType([GetClientsIdConfiguredCurrenciesResponseCurrencyDetailsItem::class])]
    public array $currencyDetails;

    /**
     * @var ?string $requestId
     */
    #[JsonProperty('requestId')]
    public ?string $requestId;

    /**
     * @param array{
     *   success: bool,
     *   currencies: array<string>,
     *   currencyDetails: array<GetClientsIdConfiguredCurrenciesResponseCurrencyDetailsItem>,
     *   defaultCurrency?: ?string,
     *   requestId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->currencies = $values['currencies'];
        $this->defaultCurrency = $values['defaultCurrency'] ?? null;
        $this->currencyDetails = $values['currencyDetails'];
        $this->requestId = $values['requestId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
