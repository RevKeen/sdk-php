<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Integrations\Types\IntegrationsActivateRequestCredentials;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Integrations\Types\IntegrationsActivateRequestPaymentMappingsItem;
use RevKeen\Core\Types\ArrayType;

class IntegrationsActivateRequest extends JsonSerializableType
{
    /**
     * @var IntegrationsActivateRequestCredentials $credentials
     */
    #[JsonProperty('credentials')]
    public IntegrationsActivateRequestCredentials $credentials;

    /**
     * @var ?int $syncIntervalMinutes
     */
    #[JsonProperty('syncIntervalMinutes')]
    public ?int $syncIntervalMinutes;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $syncEnabled
     */
    #[JsonProperty('syncEnabled')]
    public ?bool $syncEnabled;

    /**
     * @var ?bool $syncPatients
     */
    #[JsonProperty('syncPatients')]
    public ?bool $syncPatients;

    /**
     * @var ?bool $syncProducts
     */
    #[JsonProperty('syncProducts')]
    public ?bool $syncProducts;

    /**
     * @var ?bool $syncPackages
     */
    #[JsonProperty('syncPackages')]
    public ?bool $syncPackages;

    /**
     * @var ?bool $syncInvoices
     */
    #[JsonProperty('syncInvoices')]
    public ?bool $syncInvoices;

    /**
     * @var ?bool $pushPayments
     */
    #[JsonProperty('pushPayments')]
    public ?bool $pushPayments;

    /**
     * @var ?bool $autoSendInvoices
     */
    #[JsonProperty('autoSendInvoices')]
    public ?bool $autoSendInvoices;

    /**
     * @var ?array<IntegrationsActivateRequestPaymentMappingsItem> $paymentMappings
     */
    #[JsonProperty('paymentMappings'), ArrayType([IntegrationsActivateRequestPaymentMappingsItem::class])]
    public ?array $paymentMappings;

    /**
     * @param array{
     *   credentials: IntegrationsActivateRequestCredentials,
     *   syncIntervalMinutes?: ?int,
     *   currency?: ?string,
     *   syncEnabled?: ?bool,
     *   syncPatients?: ?bool,
     *   syncProducts?: ?bool,
     *   syncPackages?: ?bool,
     *   syncInvoices?: ?bool,
     *   pushPayments?: ?bool,
     *   autoSendInvoices?: ?bool,
     *   paymentMappings?: ?array<IntegrationsActivateRequestPaymentMappingsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->credentials = $values['credentials'];
        $this->syncIntervalMinutes = $values['syncIntervalMinutes'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->syncEnabled = $values['syncEnabled'] ?? null;
        $this->syncPatients = $values['syncPatients'] ?? null;
        $this->syncProducts = $values['syncProducts'] ?? null;
        $this->syncPackages = $values['syncPackages'] ?? null;
        $this->syncInvoices = $values['syncInvoices'] ?? null;
        $this->pushPayments = $values['pushPayments'] ?? null;
        $this->autoSendInvoices = $values['autoSendInvoices'] ?? null;
        $this->paymentMappings = $values['paymentMappings'] ?? null;
    }
}
