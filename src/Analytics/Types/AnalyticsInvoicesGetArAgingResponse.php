<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsInvoicesGetArAgingResponse extends JsonSerializableType
{
    /**
     * @var string $asOfDate
     */
    #[JsonProperty('asOfDate')]
    public string $asOfDate;

    /**
     * @var array<AnalyticsInvoicesGetArAgingResponseBucketsItem> $buckets
     */
    #[JsonProperty('buckets'), ArrayType([AnalyticsInvoicesGetArAgingResponseBucketsItem::class])]
    public array $buckets;

    /**
     * @var float $totalOutstanding
     */
    #[JsonProperty('totalOutstanding')]
    public float $totalOutstanding;

    /**
     * @var float $totalInvoices
     */
    #[JsonProperty('totalInvoices')]
    public float $totalInvoices;

    /**
     * @param array{
     *   asOfDate: string,
     *   buckets: array<AnalyticsInvoicesGetArAgingResponseBucketsItem>,
     *   totalOutstanding: float,
     *   totalInvoices: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->asOfDate = $values['asOfDate'];
        $this->buckets = $values['buckets'];
        $this->totalOutstanding = $values['totalOutstanding'];
        $this->totalInvoices = $values['totalInvoices'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
