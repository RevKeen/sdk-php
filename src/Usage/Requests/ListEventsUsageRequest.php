<?php

namespace RevKeen\Usage\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class ListEventsUsageRequest extends JsonSerializableType
{
    /**
     * @var ?string $meterId Filter by meter ID
     */
    public ?string $meterId;

    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?string $externalCustomerId Filter by external customer ID
     */
    public ?string $externalCustomerId;

    /**
     * @var ?string $subscriptionId Filter by subscription ID
     */
    public ?string $subscriptionId;

    /**
     * @var ?string $startTime Start of time range (ISO 8601)
     */
    public ?string $startTime;

    /**
     * @var ?string $endTime End of time range (ISO 8601)
     */
    public ?string $endTime;

    /**
     * @var ?string $limit Max results (default 100, max 100)
     */
    public ?string $limit;

    /**
     * @param array{
     *   meterId?: ?string,
     *   customerId?: ?string,
     *   externalCustomerId?: ?string,
     *   subscriptionId?: ?string,
     *   startTime?: ?string,
     *   endTime?: ?string,
     *   limit?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->meterId = $values['meterId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->externalCustomerId = $values['externalCustomerId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
