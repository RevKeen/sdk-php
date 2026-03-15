<?php

namespace RevKeen\PaymentAttempts\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class ListBySubscriptionPaymentAttemptsRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit Maximum number of results (1-100)
     */
    public ?float $limit;

    /**
     * @param array{
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
