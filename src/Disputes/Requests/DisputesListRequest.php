<?php

namespace RevKeen\Disputes\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Disputes\Types\DisputesListRequestStatus;
use RevKeen\Disputes\Types\DisputesListRequestResolution;
use RevKeen\Disputes\Types\DisputesListRequestNeedsEvidence;

class DisputesListRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<DisputesListRequestStatus> $status Filter by dispute status
     */
    public ?string $status;

    /**
     * @var ?value-of<DisputesListRequestResolution> $resolution Filter by resolution outcome
     */
    public ?string $resolution;

    /**
     * @var ?string $paymentId Filter by original payment ID
     */
    public ?string $paymentId;

    /**
     * @var ?string $gateway Filter by payment gateway (nmi, stripe, etc.)
     */
    public ?string $gateway;

    /**
     * @var ?string $disputedAfter ISO 8601 date - only disputes after this date
     */
    public ?string $disputedAfter;

    /**
     * @var ?string $disputedBefore ISO 8601 date - only disputes before this date
     */
    public ?string $disputedBefore;

    /**
     * @var ?value-of<DisputesListRequestNeedsEvidence> $needsEvidence Only show disputes that need evidence submission
     */
    public ?string $needsEvidence;

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
     *   status?: ?value-of<DisputesListRequestStatus>,
     *   resolution?: ?value-of<DisputesListRequestResolution>,
     *   paymentId?: ?string,
     *   gateway?: ?string,
     *   disputedAfter?: ?string,
     *   disputedBefore?: ?string,
     *   needsEvidence?: ?value-of<DisputesListRequestNeedsEvidence>,
     *   limit?: ?float,
     *   offset?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->resolution = $values['resolution'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
        $this->gateway = $values['gateway'] ?? null;
        $this->disputedAfter = $values['disputedAfter'] ?? null;
        $this->disputedBefore = $values['disputedBefore'] ?? null;
        $this->needsEvidence = $values['needsEvidence'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
