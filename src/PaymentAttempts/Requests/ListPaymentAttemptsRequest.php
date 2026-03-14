<?php

namespace RevKeen\PaymentAttempts\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;

class ListPaymentAttemptsRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit Maximum number of results to return
     */
    public ?float $limit;

    /**
     * @var ?string $gateway Filter by gateway (e.g., 'nmi')
     */
    public ?string $gateway;

    /**
     * @var ?string $category Filter by error category
     */
    public ?string $category;

    /**
     * @var ?string $subscriptionId Filter by subscription ID
     */
    public ?string $subscriptionId;

    /**
     * @var ?DateTime $startDate Filter by created_at >= (ISO 8601)
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate Filter by created_at <= (ISO 8601)
     */
    public ?DateTime $endDate;

    /**
     * @param array{
     *   limit?: ?float,
     *   gateway?: ?string,
     *   category?: ?string,
     *   subscriptionId?: ?string,
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
    }
}
