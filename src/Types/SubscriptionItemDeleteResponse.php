<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Confirmation that the subscription line item was removed.
 */
class SubscriptionItemDeleteResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var string $deletedId
     */
    #[JsonProperty('deleted_id')]
    public string $deletedId;

    /**
     * @param array{
     *   success: bool,
     *   deletedId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->deletedId = $values['deletedId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
