<?php

namespace RevKeen\PaymentAttempts\Analytics\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use DateTime;

class GetDeclinesAnalyticsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $startDate Start date (ISO 8601)
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate End date (ISO 8601)
     */
    public ?DateTime $endDate;

    /**
     * @var ?string $gateway Filter by gateway (e.g., 'nmi', 'stripe')
     */
    public ?string $gateway;

    /**
     * @param array{
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     *   gateway?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
    }
}
