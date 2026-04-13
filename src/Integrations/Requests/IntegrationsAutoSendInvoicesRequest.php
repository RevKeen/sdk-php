<?php

namespace RevKeen\Integrations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class IntegrationsAutoSendInvoicesRequest extends JsonSerializableType
{
    /**
     * @var bool $autoSendInvoices
     */
    #[JsonProperty('autoSendInvoices')]
    public bool $autoSendInvoices;

    /**
     * @param array{
     *   autoSendInvoices: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->autoSendInvoices = $values['autoSendInvoices'];
    }
}
