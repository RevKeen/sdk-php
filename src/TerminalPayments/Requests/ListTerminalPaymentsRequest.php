<?php

namespace RevKeen\TerminalPayments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\TerminalPayments\Types\ListTerminalPaymentsRequestStatus;
use RevKeen\TerminalPayments\Types\ListTerminalPaymentsRequestType;

class ListTerminalPaymentsRequest extends JsonSerializableType
{
    /**
     * @var ?string $invoiceId Filter by invoice ID
     */
    public ?string $invoiceId;

    /**
     * @var ?value-of<ListTerminalPaymentsRequestStatus> $status Filter by payment status
     */
    public ?string $status;

    /**
     * @var ?value-of<ListTerminalPaymentsRequestType> $type Filter by payment type
     */
    public ?string $type;

    /**
     * @var ?string $deviceId Filter by device ID
     */
    public ?string $deviceId;

    /**
     * @var ?int $limit Maximum number of results (1-100)
     */
    public ?int $limit;

    /**
     * @var ?string $startingAfter Cursor for pagination — return results after this terminal payment ID
     */
    public ?string $startingAfter;

    /**
     * @param array{
     *   invoiceId?: ?string,
     *   status?: ?value-of<ListTerminalPaymentsRequestStatus>,
     *   type?: ?value-of<ListTerminalPaymentsRequestType>,
     *   deviceId?: ?string,
     *   limit?: ?int,
     *   startingAfter?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->startingAfter = $values['startingAfter'] ?? null;
    }
}
