<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class ChargeDuplicateErrorResponse extends JsonSerializableType
{
    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var ?string $existingChargeId
     */
    #[JsonProperty('existingChargeId')]
    public ?string $existingChargeId;

    /**
     * @param array{
     *   error: string,
     *   existingChargeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->existingChargeId = $values['existingChargeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
