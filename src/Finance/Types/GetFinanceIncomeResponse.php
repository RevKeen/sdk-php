<?php

namespace RevKeen\Finance\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class GetFinanceIncomeResponse extends JsonSerializableType
{
    /**
     * @var GetFinanceIncomeResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public GetFinanceIncomeResponseSummary $summary;

    /**
     * @var array<array<string, mixed>> $rows Income report rows
     */
    #[JsonProperty('rows'), ArrayType([['string' => 'mixed']])]
    public array $rows;

    /**
     * @param array{
     *   summary: GetFinanceIncomeResponseSummary,
     *   rows: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->summary = $values['summary'];
        $this->rows = $values['rows'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
