<?php

namespace RevKeen\UserInvitations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;
use RevKeen\UserInvitations\Types\PostUserInvitationsRequestRole;

class PostUserInvitationsRequest extends JsonSerializableType
{
    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var value-of<PostUserInvitationsRequestRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var ?string $merchantId
     */
    #[JsonProperty('merchantId')]
    public ?string $merchantId;

    /**
     * @param array{
     *   email: string,
     *   role: value-of<PostUserInvitationsRequestRole>,
     *   merchantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->email = $values['email'];
        $this->role = $values['role'];
        $this->merchantId = $values['merchantId'] ?? null;
    }
}
