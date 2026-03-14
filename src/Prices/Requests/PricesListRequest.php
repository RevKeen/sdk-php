<?php

namespace RevKeen\Prices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Prices\Types\PricesListRequestType;
use RevKeen\Prices\Types\PricesListRequestPricingModel;
use RevKeen\Prices\Types\PricesListRequestActive;

class PricesListRequest extends JsonSerializableType
{
    /**
     * @var ?string $productId Filter by product ID
     */
    public ?string $productId;

    /**
     * @var ?value-of<PricesListRequestType> $type Filter by price type
     */
    public ?string $type;

    /**
     * @var ?value-of<PricesListRequestPricingModel> $pricingModel Filter by pricing model
     */
    public ?string $pricingModel;

    /**
     * @var ?value-of<PricesListRequestActive> $active Filter by active status
     */
    public ?string $active;

    /**
     * @var ?string $currency Filter by currency
     */
    public ?string $currency;

    /**
     * @var ?string $lookupKey Filter by lookup key
     */
    public ?string $lookupKey;

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
     *   productId?: ?string,
     *   type?: ?value-of<PricesListRequestType>,
     *   pricingModel?: ?value-of<PricesListRequestPricingModel>,
     *   active?: ?value-of<PricesListRequestActive>,
     *   currency?: ?string,
     *   lookupKey?: ?string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->productId = $values['productId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->pricingModel = $values['pricingModel'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->lookupKey = $values['lookupKey'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
