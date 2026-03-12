<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class CustomersEntitlementsCheckRequest extends JsonSerializableType
{
    /**
     * @var string $benefitKey Benefit key to check
     */
    public string $benefitKey;

    /**
     * @param array{
     *   benefitKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->benefitKey = $values['benefitKey'];
    }
}
