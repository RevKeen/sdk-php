<?php

namespace RevKeen\UserInvitations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\Core\Types\ArrayType;

class GetUserInvitationsResponse extends JsonSerializableType
{
    /**
     * @var array<GetUserInvitationsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([GetUserInvitationsResponseDataItem::class])]
    public array $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: array<GetUserInvitationsResponseDataItem>,
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
