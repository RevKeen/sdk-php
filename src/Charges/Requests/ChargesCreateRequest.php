<?php

namespace RevKeen\Charges\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class ChargesCreateRequest extends JsonSerializableType
{
    /**
     * @var string $customerId
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var int $amountMinor
     */
    #[JsonProperty('amountMinor')]
    public int $amountMinor;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var ?string $paymentMethodId
     */
    #[JsonProperty('paymentMethodId')]
    public ?string $paymentMethodId;

    /**
     * @var ?bool $capture
     */
    #[JsonProperty('capture')]
    public ?bool $capture;

    /**
     * @var ?string $statementDescriptor
     */
    #[JsonProperty('statementDescriptor')]
    public ?string $statementDescriptor;

    /**
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var ?bool $sendReceipt
     */
    #[JsonProperty('sendReceipt')]
    public ?bool $sendReceipt;

    /**
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotencyKey')]
    public ?string $idempotencyKey;

    /**
     * @param array{
     *   customerId: string,
     *   amountMinor: int,
     *   description: string,
     *   currency?: ?string,
     *   paymentMethodId?: ?string,
     *   capture?: ?bool,
     *   statementDescriptor?: ?string,
     *   metadata?: ?array<string, mixed>,
     *   sendReceipt?: ?bool,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->amountMinor = $values['amountMinor'];
        $this->currency = $values['currency'] ?? null;
        $this->description = $values['description'];
        $this->paymentMethodId = $values['paymentMethodId'] ?? null;
        $this->capture = $values['capture'] ?? null;
        $this->statementDescriptor = $values['statementDescriptor'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->sendReceipt = $values['sendReceipt'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }
}
