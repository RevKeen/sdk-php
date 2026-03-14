<?php

namespace RevKeen\UserInvitations\Types;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PostUserInvitationsIdResendResponseData extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var value-of<PostUserInvitationsIdResendResponseDataRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var string $merchantId
     */
    #[JsonProperty('merchantId')]
    public string $merchantId;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @param array{
     *   id: string,
     *   email: string,
     *   role: value-of<PostUserInvitationsIdResendResponseDataRole>,
     *   merchantId: string,
     *   status: string,
     *   createdAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->email = $values['email'];
        $this->role = $values['role'];
        $this->merchantId = $values['merchantId'];
        $this->status = $values['status'];
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
