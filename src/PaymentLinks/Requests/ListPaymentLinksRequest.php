<?php

namespace RevKeen\PaymentLinks\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\PaymentLinks\Types\ListPaymentLinksRequestStatus;
use RevKeen\PaymentLinks\Types\ListPaymentLinksRequestMode;

class ListPaymentLinksRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListPaymentLinksRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?value-of<ListPaymentLinksRequestMode> $mode
     */
    public ?string $mode;

    /**
     * @var ?string $search
     */
    public ?string $search;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     *   status?: ?value-of<ListPaymentLinksRequestStatus>,
     *   mode?: ?value-of<ListPaymentLinksRequestMode>,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->mode = $values['mode'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
