<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CustomersEntitlementsRevokeByKeyRequest extends JsonSerializableType
{
    /**
     * @var ?string $benefitKey Revoke by benefit key instead of entitlement ID
     */
    public ?string $benefitKey;

    /**
     * @param array{
     *   benefitKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->benefitKey = $values['benefitKey'] ?? null;
    }
}
