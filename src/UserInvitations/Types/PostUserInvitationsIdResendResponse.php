<?php

namespace RevKeen\UserInvitations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PostUserInvitationsIdResendResponse extends JsonSerializableType
{
    /**
     * @var PostUserInvitationsIdResendResponseData $data
     */
    #[JsonProperty('data')]
    public PostUserInvitationsIdResendResponseData $data;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @param array{
     *   data: PostUserInvitationsIdResendResponseData,
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
