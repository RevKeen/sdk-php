<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Subscription billing terms for recurring invoices
 */
class InvoiceSubscriptionTerms extends JsonSerializableType
{
    /**
     * @var value-of<InvoiceSubscriptionTermsCollectionMethod> $collectionMethod How to collect payment for recurring invoices
     */
    #[JsonProperty('collection_method')]
    public string $collectionMethod;

    /**
     * @var value-of<InvoiceSubscriptionTermsStartMode> $startMode When the subscription billing cycle starts
     */
    #[JsonProperty('start_mode')]
    public string $startMode;

    /**
     * @var ?string $startDate Start date (ISO 8601) — required when start_mode is 'specific_date'
     */
    #[JsonProperty('start_date')]
    public ?string $startDate;

    /**
     * @var value-of<InvoiceSubscriptionTermsDurationType> $durationType How the subscription duration is determined
     */
    #[JsonProperty('duration_type')]
    public string $durationType;

    /**
     * @var ?int $durationCount Number of billing cycles — required when duration_type is 'fixed_cycles'
     */
    #[JsonProperty('duration_count')]
    public ?int $durationCount;

    /**
     * @var ?string $endDate End date (ISO 8601) — required when duration_type is 'end_date'
     */
    #[JsonProperty('end_date')]
    public ?string $endDate;

    /**
     * @var value-of<InvoiceSubscriptionTermsFirstPaymentBehavior> $firstPaymentBehavior Whether to charge the first cycle immediately or defer to the start date
     */
    #[JsonProperty('first_payment_behavior')]
    public string $firstPaymentBehavior;

    /**
     * @param array{
     *   collectionMethod: value-of<InvoiceSubscriptionTermsCollectionMethod>,
     *   startMode: value-of<InvoiceSubscriptionTermsStartMode>,
     *   durationType: value-of<InvoiceSubscriptionTermsDurationType>,
     *   firstPaymentBehavior: value-of<InvoiceSubscriptionTermsFirstPaymentBehavior>,
     *   startDate?: ?string,
     *   durationCount?: ?int,
     *   endDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->collectionMethod = $values['collectionMethod'];
        $this->startMode = $values['startMode'];
        $this->startDate = $values['startDate'] ?? null;
        $this->durationType = $values['durationType'];
        $this->durationCount = $values['durationCount'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->firstPaymentBehavior = $values['firstPaymentBehavior'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
