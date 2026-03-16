<?php

namespace RevKeen\TerminalPayments\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CreateTerminalPaymentRequest extends JsonSerializableType
{
    /**
     * @var string $deviceId The ID of the terminal device to send the payment to. Use List Devices to discover available device IDs. Even merchants with a single terminal must pass the device_id explicitly — there is no auto-routing fallback.
     */
    #[JsonProperty('device_id')]
    public string $deviceId;

    /**
     * @var int $amountMinor Amount in minor units (e.g., pence for GBP, cents for USD)
     */
    #[JsonProperty('amount_minor')]
    public int $amountMinor;

    /**
     * @var string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $invoiceId The invoice to charge. Omit for walk-in or ad-hoc payments where no invoice exists. When omitted, the terminal payment is recorded without an invoice association.
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $reference Custom reference for the payment. Auto-generated if not provided.
     */
    #[JsonProperty('reference')]
    public ?string $reference;

    /**
     * @param array{
     *   deviceId: string,
     *   amountMinor: int,
     *   currency: string,
     *   invoiceId?: ?string,
     *   reference?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deviceId = $values['deviceId'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->reference = $values['reference'] ?? null;
    }
}
