<?php

namespace RevKeen\Disputes\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Traits\Dispute;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Types\DisputeStatus;
use RevKeen\Types\DisputeResolution;

/**
 * A dispute (chargeback) represents a customer's challenge to a charge with their card issuer. Track lifecycle stages and submit evidence to contest.
 */
class DisputesRetrieveResponseData extends JsonSerializableType
{
    use Dispute;

    /**
     * @var ?float $daysUntilDue
     */
    #[JsonProperty('days_until_due')]
    public ?float $daysUntilDue;

    /**
     * @var bool $isOverdue
     */
    #[JsonProperty('is_overdue')]
    public bool $isOverdue;

    /**
     * @param array{
     *   id: string,
     *   publicId: string,
     *   gateway: string,
     *   gatewayDisputeId: string,
     *   amountMinor: float,
     *   currency: string,
     *   evidenceSubmitted: bool,
     *   status: value-of<DisputeStatus>,
     *   disputedAt: string,
     *   createdAt: string,
     *   isOverdue: bool,
     *   paymentId?: ?string,
     *   parentTransactionId?: ?string,
     *   gatewayTransactionId?: ?string,
     *   reasonCode?: ?string,
     *   reason?: ?string,
     *   networkReasonCode?: ?string,
     *   networkReasonDescription?: ?string,
     *   customerName?: ?string,
     *   cardBrand?: ?string,
     *   cardLast4?: ?string,
     *   evidenceDueBy?: ?string,
     *   evidenceSubmittedAt?: ?string,
     *   resolution?: ?value-of<DisputeResolution>,
     *   resolvedAt?: ?string,
     *   daysUntilDue?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->publicId = $values['publicId'];
        $this->paymentId = $values['paymentId'] ?? null;
        $this->parentTransactionId = $values['parentTransactionId'] ?? null;
        $this->gateway = $values['gateway'];
        $this->gatewayDisputeId = $values['gatewayDisputeId'];
        $this->gatewayTransactionId = $values['gatewayTransactionId'] ?? null;
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reasonCode = $values['reasonCode'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->networkReasonCode = $values['networkReasonCode'] ?? null;
        $this->networkReasonDescription = $values['networkReasonDescription'] ?? null;
        $this->customerName = $values['customerName'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->cardLast4 = $values['cardLast4'] ?? null;
        $this->evidenceDueBy = $values['evidenceDueBy'] ?? null;
        $this->evidenceSubmitted = $values['evidenceSubmitted'];
        $this->evidenceSubmittedAt = $values['evidenceSubmittedAt'] ?? null;
        $this->status = $values['status'];
        $this->resolution = $values['resolution'] ?? null;
        $this->resolvedAt = $values['resolvedAt'] ?? null;
        $this->disputedAt = $values['disputedAt'];
        $this->createdAt = $values['createdAt'];
        $this->daysUntilDue = $values['daysUntilDue'] ?? null;
        $this->isOverdue = $values['isOverdue'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
