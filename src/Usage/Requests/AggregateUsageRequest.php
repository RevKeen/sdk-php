<?php

namespace RevKeen\Usage\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class AggregateUsageRequest extends JsonSerializableType
{
    /**
     * @var string $startTime Start of time range (ISO 8601)
     */
    public string $startTime;

    /**
     * @var string $endTime End of time range (ISO 8601)
     */
    public string $endTime;

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
     * @param array{
     *   startTime: string,
     *   endTime: string,
     *   customerId?: ?string,
     *   externalCustomerId?: ?string,
     *   subscriptionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startTime = $values['startTime'];
        $this->endTime = $values['endTime'];
        $this->customerId = $values['customerId'] ?? null;
        $this->externalCustomerId = $values['externalCustomerId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
    }
}
