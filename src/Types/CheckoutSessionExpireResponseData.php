<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class CheckoutSessionExpireResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<CheckoutSessionExpireResponseDataStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $expiredAt
     */
    #[JsonProperty('expiredAt')]
    public string $expiredAt;

    /**
     * @param array{
     *   id: string,
     *   status: value-of<CheckoutSessionExpireResponseDataStatus>,
     *   expiredAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->status = $values['status'];
        $this->expiredAt = $values['expiredAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
