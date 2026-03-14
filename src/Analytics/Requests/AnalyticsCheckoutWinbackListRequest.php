<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Analytics\Types\AnalyticsCheckoutWinbackListRequestType;
use RevKeen\Analytics\Types\AnalyticsCheckoutWinbackListRequestStatus;

class AnalyticsCheckoutWinbackListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<AnalyticsCheckoutWinbackListRequestType> $type Filter by opportunity type
     */
    public ?string $type;

    /**
     * @var ?value-of<AnalyticsCheckoutWinbackListRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?int $minValueCents Minimum potential value in cents
     */
    public ?int $minValueCents;

    /**
     * @var ?int $page Page number
     */
    public ?int $page;

    /**
     * @var ?int $pageSize Results per page (1-100)
     */
    public ?int $pageSize;

    /**
     * @param array{
     *   type?: ?value-of<AnalyticsCheckoutWinbackListRequestType>,
     *   status?: ?value-of<AnalyticsCheckoutWinbackListRequestStatus>,
     *   minValueCents?: ?int,
     *   page?: ?int,
     *   pageSize?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->minValueCents = $values['minValueCents'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
    }
}
