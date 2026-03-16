<?php

namespace RevKeen\Finance\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Finance\Types\GetFinanceIncomeRequestGroupBy;

class GetFinanceIncomeRequest extends JsonSerializableType
{
    /**
     * @var string $startDate Start date
     */
    public string $startDate;

    /**
     * @var string $endDate End date
     */
    public string $endDate;

    /**
     * @var ?value-of<GetFinanceIncomeRequestGroupBy> $groupBy Group results by time period
     */
    public ?string $groupBy;

    /**
     * @var ?string $subscriptionId Filter by subscription UUID
     */
    public ?string $subscriptionId;

    /**
     * @var ?string $status Filter by status
     */
    public ?string $status;

    /**
     * @param array{
     *   startDate: string,
     *   endDate: string,
     *   groupBy?: ?value-of<GetFinanceIncomeRequestGroupBy>,
     *   subscriptionId?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startDate = $values['startDate'];
        $this->endDate = $values['endDate'];
        $this->groupBy = $values['groupBy'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
