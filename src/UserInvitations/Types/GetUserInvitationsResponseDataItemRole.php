<?php

namespace RevKeen\UserInvitations\Types;

enum GetUserInvitationsResponseDataItemRole: string
{
    case Admin = "admin";
    case Member = "member";
    case Viewer = "viewer";
}
