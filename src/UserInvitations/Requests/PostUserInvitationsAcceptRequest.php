<?php

namespace RevKeen\UserInvitations\Requests;

use RevKeen\Core\Json\JsonSerializableType;
use RevKeen\Core\Json\JsonProperty;

class PostUserInvitationsAcceptRequest extends JsonSerializableType
{
    /**
     * @var string $invitationToken
     */
    #[JsonProperty('invitationToken')]
    public string $invitationToken;

    /**
     * @var string $password
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   invitationToken: string,
     *   password: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invitationToken = $values['invitationToken'];
        $this->password = $values['password'];
        $this->name = $values['name'] ?? null;
    }
}
