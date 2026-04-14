<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * An invoice belonging to a specific customer, with summarized billing details.
 */
class CustomerInvoice extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $customerId
     */
    #[JsonProperty('customer_id')]
    public string $customerId;

    /**
     * @var ?string $invoiceNumber
     */
    #[JsonProperty('invoice_number')]
    public ?string $invoiceNumber;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $totalMinor
     */
    #[JsonProperty('total_minor')]
    public int $totalMinor;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $dueDate
     */
    #[JsonProperty('due_date')]
    public ?string $dueDate;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   customerId: string,
     *   status: string,
     *   totalMinor: int,
     *   currency: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   invoiceNumber?: ?string,
     *   dueDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->customerId = $values['customerId'];
        $this->invoiceNumber = $values['invoiceNumber'] ?? null;
        $this->status = $values['status'];
        $this->totalMinor = $values['totalMinor'];
        $this->currency = $values['currency'];
        $this->dueDate = $values['dueDate'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
