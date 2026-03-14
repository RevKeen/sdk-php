<?php

namespace RevKeen\Invoices\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Invoices\Types\InvoicesPayRequestPaymentMethod;
use DateTime;
use RevKeen\Core\Types\Date;

class InvoicesPayRequest extends JsonSerializableType
{
    /**
     * @var ?int $amountMinor Payment amount in minor units (cents). If not provided, pays the full amount due.
     */
    #[JsonProperty('amount_minor')]
    public ?int $amountMinor;

    /**
     * @var ?value-of<InvoicesPayRequestPaymentMethod> $paymentMethod The payment method used
     */
    #[JsonProperty('payment_method')]
    public ?string $paymentMethod;

    /**
     * @var ?string $reference External reference (check number, transfer ID, etc.)
     */
    #[JsonProperty('reference')]
    public ?string $reference;

    /**
     * @var ?string $notes Additional notes about the payment
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?DateTime $paidAt When the payment was received (defaults to now)
     */
    #[JsonProperty('paid_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $paidAt;

    /**
     * @param array{
     *   amountMinor?: ?int,
     *   paymentMethod?: ?value-of<InvoicesPayRequestPaymentMethod>,
     *   reference?: ?string,
     *   notes?: ?string,
     *   paidAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMinor = $values['amountMinor'] ?? null;
        $this->paymentMethod = $values['paymentMethod'] ?? null;
        $this->reference = $values['reference'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->paidAt = $values['paidAt'] ?? null;
    }
}
