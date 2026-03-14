<?php

namespace RevKeen\Analytics\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class AnalyticsCustomersRetrieveResponse extends JsonSerializableType
{
    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var float $totalRevenue
     */
    #[JsonProperty('totalRevenue')]
    public float $totalRevenue;

    /**
     * @var float $totalInvoices
     */
    #[JsonProperty('totalInvoices')]
    public float $totalInvoices;

    /**
     * @var float $avgInvoiceValue
     */
    #[JsonProperty('avgInvoiceValue')]
    public float $avgInvoiceValue;

    /**
     * @var float $outstandingBalance
     */
    #[JsonProperty('outstandingBalance')]
    public float $outstandingBalance;

    /**
     * @var array<array<string, mixed>> $paymentHistory Payment history records
     */
    #[JsonProperty('paymentHistory'), ArrayType([['string' => 'mixed']])]
    public array $paymentHistory;

    /**
     * @param array{
     *   customerId: string,
     *   totalRevenue: float,
     *   totalInvoices: float,
     *   avgInvoiceValue: float,
     *   outstandingBalance: float,
     *   paymentHistory: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->totalRevenue = $values['totalRevenue'];
        $this->totalInvoices = $values['totalInvoices'];
        $this->avgInvoiceValue = $values['avgInvoiceValue'];
        $this->outstandingBalance = $values['outstandingBalance'];
        $this->paymentHistory = $values['paymentHistory'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
