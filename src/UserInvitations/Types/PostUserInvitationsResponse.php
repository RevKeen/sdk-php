<?php

namespace RevKeen\UserInvitations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PostUserInvitationsResponse extends JsonSerializableType
{
    /**
     * @var PostUserInvitationsResponseData $data
     */
    #[JsonProperty('data')]
    public PostUserInvitationsResponseData $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: PostUserInvitationsResponseData,
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
