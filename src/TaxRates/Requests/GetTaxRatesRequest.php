<?php

namespace RevKeen\TaxRates\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\TaxRates\Types\GetTaxRatesRequestActive;
use RevKeen\TaxRates\Types\GetTaxRatesRequestTaxType;
use RevKeen\TaxRates\Types\GetTaxRatesRequestInclusive;

class GetTaxRatesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetTaxRatesRequestActive> $active Filter by active status
     */
    public ?string $active;

    /**
     * @var ?value-of<GetTaxRatesRequestTaxType> $taxType Filter by tax type
     */
    public ?string $taxType;

    /**
     * @var ?string $country Filter by country code
     */
    public ?string $country;

    /**
     * @var ?string $state Filter by state/province code
     */
    public ?string $state;

    /**
     * @var ?value-of<GetTaxRatesRequestInclusive> $inclusive Filter by inclusive status
     */
    public ?string $inclusive;

    /**
     * @var ?int $limit Number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination (ID to start after)
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination (ID to end before)
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   active?: ?value-of<GetTaxRatesRequestActive>,
     *   taxType?: ?value-of<GetTaxRatesRequestTaxType>,
     *   country?: ?string,
     *   state?: ?string,
     *   inclusive?: ?value-of<GetTaxRatesRequestInclusive>,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->taxType = $values['taxType'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->inclusive = $values['inclusive'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
