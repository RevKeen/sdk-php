<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * A card-present payment processed through a POS terminal, with device details and card entry mode.
 */
class TerminalPayment extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for this terminal payment attempt
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $invoiceId Associated invoice ID, or null for walk-in/ad-hoc payments
     */
    #[JsonProperty('invoice_id')]
    public ?string $invoiceId;

    /**
     * @var ?string $deviceId The terminal device that processed (or is processing) this payment
     */
    #[JsonProperty('device_id')]
    public ?string $deviceId;

    /**
     * @var value-of<TerminalPaymentType> $type Transaction type. sale: original charge. refund: money returned. void: pre-settlement cancellation.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<TerminalPaymentStatus> $status Payment lifecycle status. requested: command sent, awaiting card. in_progress: terminal processing. approved: payment succeeded. declined: issuer declined. cancelled: merchant cancelled. error: terminal error. timed_out: no response within 3 minutes.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var float $amountMinor Amount in minor units (e.g., pence for GBP, cents for USD)
     */
    #[JsonProperty('amount_minor')]
    public float $amountMinor;

    /**
     * @var string $currency ISO 4217 currency code
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $reference Payment reference (invoice number or custom reference)
     */
    #[JsonProperty('reference')]
    public ?string $reference;

    /**
     * @var ?string $terminalSerial Serial number of the PAX terminal that processed this payment
     */
    #[JsonProperty('terminal_serial')]
    public ?string $terminalSerial;

    /**
     * @var ?string $uti Unique Transaction Identifier from the terminal
     */
    #[JsonProperty('uti')]
    public ?string $uti;

    /**
     * @var ?string $authCode Authorization code from the payment processor. Present when approved.
     */
    #[JsonProperty('auth_code')]
    public ?string $authCode;

    /**
     * @var ?string $responseCode Terminal response code. '00' indicates approval.
     */
    #[JsonProperty('response_code')]
    public ?string $responseCode;

    /**
     * @var ?string $rrn Retrieval Reference Number for settlement reconciliation
     */
    #[JsonProperty('rrn')]
    public ?string $rrn;

    /**
     * @var ?string $cardScheme Card network (e.g., VISA, MASTERCARD, AMEX)
     */
    #[JsonProperty('card_scheme')]
    public ?string $cardScheme;

    /**
     * @var ?string $maskedPan Masked card number — only the last 4 digits are visible
     */
    #[JsonProperty('masked_pan')]
    public ?string $maskedPan;

    /**
     * @var ?string $entryMode How the card was read: contactless (NFC tap), emv_chip (chip insert), magnetic_stripe (swipe), manual_entry (keyed), or fallback (chip-to-swipe)
     */
    #[JsonProperty('entry_mode')]
    public ?string $entryMode;

    /**
     * @var ?string $errorMessage Human-readable error message when status is error or timed_out
     */
    #[JsonProperty('error_message')]
    public ?string $errorMessage;

    /**
     * @var string $createdAt ISO 8601 timestamp when the payment was initiated
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var ?string $completedAt ISO 8601 timestamp when the terminal returned a result, or null if still in progress
     */
    #[JsonProperty('completed_at')]
    public ?string $completedAt;

    /**
     * @param array{
     *   id: string,
     *   type: value-of<TerminalPaymentType>,
     *   status: value-of<TerminalPaymentStatus>,
     *   amountMinor: float,
     *   currency: string,
     *   createdAt: string,
     *   invoiceId?: ?string,
     *   deviceId?: ?string,
     *   reference?: ?string,
     *   terminalSerial?: ?string,
     *   uti?: ?string,
     *   authCode?: ?string,
     *   responseCode?: ?string,
     *   rrn?: ?string,
     *   cardScheme?: ?string,
     *   maskedPan?: ?string,
     *   entryMode?: ?string,
     *   errorMessage?: ?string,
     *   completedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->invoiceId = $values['invoiceId'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->type = $values['type'];
        $this->status = $values['status'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'];
        $this->reference = $values['reference'] ?? null;
        $this->terminalSerial = $values['terminalSerial'] ?? null;
        $this->uti = $values['uti'] ?? null;
        $this->authCode = $values['authCode'] ?? null;
        $this->responseCode = $values['responseCode'] ?? null;
        $this->rrn = $values['rrn'] ?? null;
        $this->cardScheme = $values['cardScheme'] ?? null;
        $this->maskedPan = $values['maskedPan'] ?? null;
        $this->entryMode = $values['entryMode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->completedAt = $values['completedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
