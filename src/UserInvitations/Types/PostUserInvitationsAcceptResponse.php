<?php

namespace RevKeen\UserInvitations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class PostUserInvitationsAcceptResponse extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $data User object
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public array $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: array<string, mixed>,
     *   requestId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
        $this->requestId = $values['requestId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
