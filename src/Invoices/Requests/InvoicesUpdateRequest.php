<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Invoices\Types\InvoicesUpdateRequestSubscriptionTerms;

class InvoicesUpdateRequest extends JsonSerializableType
{
    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $totalMinor
     */
    #[JsonProperty('total_minor')]
    public ?int $totalMinor;

    /**
     * @var ?string $dueDate
     */
    #[JsonProperty('due_date')]
    public ?string $dueDate;

    /**
     * @var ?InvoicesUpdateRequestSubscriptionTerms $subscriptionTerms Subscription billing terms — set to null to remove
     */
    #[JsonProperty('subscription_terms')]
    public ?InvoicesUpdateRequestSubscriptionTerms $subscriptionTerms;

    /**
     * @param array{
     *   status?: ?string,
     *   totalMinor?: ?int,
     *   dueDate?: ?string,
     *   subscriptionTerms?: ?InvoicesUpdateRequestSubscriptionTerms,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->totalMinor = $values['totalMinor'] ?? null;
        $this->dueDate = $values['dueDate'] ?? null;
        $this->subscriptionTerms = $values['subscriptionTerms'] ?? null;
    }
}
