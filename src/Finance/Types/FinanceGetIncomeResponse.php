<?php

namespace RevKeen\Finance\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class FinanceGetIncomeResponse extends JsonSerializableType
{
    /**
     * @var FinanceGetIncomeResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public FinanceGetIncomeResponseSummary $summary;

    /**
     * @var array<array<string, mixed>> $rows Income report rows
     */
    #[JsonProperty('rows'), ArrayType([['string' => 'mixed']])]
    public array $rows;

    /**
     * @param array{
     *   summary: FinanceGetIncomeResponseSummary,
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
