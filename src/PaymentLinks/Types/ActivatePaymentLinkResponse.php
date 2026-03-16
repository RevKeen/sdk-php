<?php

namespace RevKeen\PaymentLinks\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use DateTime;
use RevKeen\Core\Types\Date;

class ActivatePaymentLinkResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ActivatePaymentLinkResponseStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $statusChangedAt
     */
    #[JsonProperty('status_changed_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $statusChangedAt;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   status: value-of<ActivatePaymentLinkResponseStatus>,
     *   statusChangedAt: DateTime,
     *   isActive: bool,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->status = $values['status'];
        $this->statusChangedAt = $values['statusChangedAt'];
        $this->isActive = $values['isActive'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
