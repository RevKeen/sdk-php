<?php

namespace RevKeen\Entitlements\Requests;

use RevKeen\Core\Json\JsonSerializableType;

class EntitlementsCheckRequest extends JsonSerializableType
{
    /**
     * @var string $customerId Customer UUID (required)
     */
    public string $customerId;

    /**
     * @var string $benefitKey Benefit key to check
     */
    public string $benefitKey;

    /**
     * @param array{
     *   customerId: string,
     *   benefitKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->benefitKey = $values['benefitKey'];
    }
}
