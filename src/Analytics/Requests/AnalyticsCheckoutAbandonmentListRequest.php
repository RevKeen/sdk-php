<?php

namespace RevKeen\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Analytics\Types\AnalyticsCheckoutAbandonmentListRequestStatus;
use RevKeen\Analytics\Types\AnalyticsCheckoutAbandonmentListRequestSeverity;

class AnalyticsCheckoutAbandonmentListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<AnalyticsCheckoutAbandonmentListRequestStatus> $status Filter by alert status
     */
    public ?string $status;

    /**
     * @var ?value-of<AnalyticsCheckoutAbandonmentListRequestSeverity> $severity Filter by severity level
     */
    public ?string $severity;

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
     *   status?: ?value-of<AnalyticsCheckoutAbandonmentListRequestStatus>,
     *   severity?: ?value-of<AnalyticsCheckoutAbandonmentListRequestSeverity>,
     *   page?: ?int,
     *   pageSize?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->severity = $values['severity'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->pageSize = $values['pageSize'] ?? null;
    }
}
