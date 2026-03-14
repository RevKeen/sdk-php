<?php

namespace RevKeen\UserInvitations\Types;

enum PostUserInvitationsRequestRole: string
{
    case Admin = "admin";
    case Member = "member";
    case Viewer = "viewer";
}
