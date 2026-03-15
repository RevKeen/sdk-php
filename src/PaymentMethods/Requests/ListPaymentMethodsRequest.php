<?php

namespace RevKeen\PaymentMethods\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\PaymentMethods\Types\ListPaymentMethodsRequestType;

class ListPaymentMethodsRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<ListPaymentMethodsRequestType> $type Filter by payment method type
     */
    public ?string $type;

    /**
     * @var ?int $limit Maximum number of results to return
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination (payment method ID)
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination (payment method ID)
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customerId?: ?string,
     *   type?: ?value-of<ListPaymentMethodsRequestType>,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
