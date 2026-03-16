<?php

namespace RevKeen\CreditNotes\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\CreditNotes\Types\CreditNotesListRequestStatus;
use RevKeen\CreditNotes\Types\CreditNotesListRequestCreditMethod;

class CreditNotesListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CreditNotesListRequestStatus> $status Filter by credit note status
     */
    public ?string $status;

    /**
     * @var ?string $invoiceId Filter by invoice ID
     */
    public ?string $invoiceId;

    /**
     * @var ?string $customerId Filter by customer ID
     */
    public ?string $customerId;

    /**
     * @var ?value-of<CreditNotesListRequestCreditMethod> $creditMethod Filter by credit method
     */
    public ?string $creditMethod;

    /**
     * @var ?string $createdAfter ISO 8601 date - only credit notes created after this date
     */
    public ?string $createdAfter;

    /**
     * @var ?string $createdBefore ISO 8601 date - only credit notes created before this date
     */
    public ?string $createdBefore;

    /**
     * @var ?float $limit Number of results to return (1-100)
     */
    public ?float $limit;

    /**
     * @var ?float $offset Number of results to skip
     */
    public ?float $offset;

    /**
     * @param array{
     *   status?: ?value-of<CreditNotesListRequestStatus>,
     *   invoiceId?: ?string,
     *   customerId?: ?string,
     *   creditMethod?: ?value-of<CreditNotesListRequestCreditMethod>,
     *   createdAfter?: ?string,
     *   createdBefore?: ?string,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->creditMethod = $values['creditMethod'] ?? null;
        $this->createdAfter = $values['createdAfter'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
