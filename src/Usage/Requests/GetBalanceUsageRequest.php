<?php

namespace RevKeen\Usage\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class GetBalanceUsageRequest extends JsonSerializableType
{
    /**
     * @var ?string $subscriptionId Filter to a specific subscription
     */
    public ?string $subscriptionId;

    /**
     * @var ?string $customerId Filter to a specific customer by RevKeen ID
     */
    public ?string $customerId;

    /**
     * @var ?string $externalCustomerId Filter to a customer by your external identifier
     */
    public ?string $externalCustomerId;

    /**
     * @var ?string $meterId Filter to a single meter
     */
    public ?string $meterId;

    /**
     * @param array{
     *   subscriptionId?: ?string,
     *   customerId?: ?string,
     *   externalCustomerId?: ?string,
     *   meterId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->externalCustomerId = $values['externalCustomerId'] ?? null;
        $this->meterId = $values['meterId'] ?? null;
    }
}
