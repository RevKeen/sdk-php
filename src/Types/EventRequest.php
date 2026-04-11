<?php

namespace RevKeen\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

/**
 * Information about the request that triggered this event
 */
class EventRequest extends JsonSerializableType
{
    /**
     * @var ?string $id Request ID that triggered this event (if applicable)
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $idempotencyKey Idempotency key used in the request (if applicable)
     */
    #[JsonProperty('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * @param array{
     *   id?: ?string,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
