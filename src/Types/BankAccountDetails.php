<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Bank account details (if type is 'us_bank_account')
 */
class BankAccountDetails extends JsonSerializableType
{
    /**
     * @var ?string $bankName The name of the bank
     */
    #[JsonProperty('bank_name')]
    public ?string $bankName;

    /**
     * @var ?string $last4 The last 4 digits of the account number
     */
    #[JsonProperty('last4')]
    public ?string $last4;

    /**
     * @var ?string $routingNumberLast4 The last 4 digits of the routing number
     */
    #[JsonProperty('routing_number_last4')]
    public ?string $routingNumberLast4;

    /**
     * @var ?value-of<BankAccountDetailsAccountType> $accountType The type of bank account
     */
    #[JsonProperty('account_type')]
    public ?string $accountType;

    /**
     * @param array{
     *   bankName?: ?string,
     *   last4?: ?string,
     *   routingNumberLast4?: ?string,
     *   accountType?: ?value-of<BankAccountDetailsAccountType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bankName = $values['bankName'] ?? null;
        $this->last4 = $values['last4'] ?? null;
        $this->routingNumberLast4 = $values['routingNumberLast4'] ?? null;
        $this->accountType = $values['accountType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
