<?php

namespace RevKeen\Payments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Payments\Types\PaymentsListRequestStatus;
use RevKeen\Payments\Types\PaymentsListRequestPaymentChannel;

class PaymentsListRequest extends JsonSerializableType
{
    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?string $invoiceId Filter by invoice ID
     */
    public ?string $invoiceId;

    /**
     * @var ?value-of<PaymentsListRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?value-of<PaymentsListRequestPaymentChannel> $paymentChannel Filter by payment channel. Use card_present for terminal payments, card_not_present for online payments.
     */
    public ?string $paymentChannel;

    /**
     * @var ?float $createdGte Filter by created_at >= (Unix timestamp)
     */
    public ?float $createdGte;

    /**
     * @var ?float $createdLte Filter by created_at <= (Unix timestamp)
     */
    public ?float $createdLte;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination - return results after this ID
     */
    public ?string $startingAfter;

    /**
     * @var ?string $endingBefore Cursor for pagination - return results before this ID
     */
    public ?string $endingBefore;

    /**
     * @param array{
     *   customerId?: ?string,
     *   invoiceId?: ?string,
     *   status?: ?value-of<PaymentsListRequestStatus>,
     *   paymentChannel?: ?value-of<PaymentsListRequestPaymentChannel>,
     *   createdGte?: ?float,
     *   createdLte?: ?float,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     *   endingBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->paymentChannel = $values['paymentChannel'] ?? null;
        $this->createdGte = $values['createdGte'] ?? null;
        $this->createdLte = $values['createdLte'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
        $this->endingBefore = $values['endingBefore'] ?? null;
    }
}
