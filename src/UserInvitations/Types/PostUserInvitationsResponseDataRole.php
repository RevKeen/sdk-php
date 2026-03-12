<?php

namespace RevKeen\UserInvitations\Types;

enum PostUserInvitationsResponseDataRole: string
{
    case Admin = "admin";
    case Member = "member";
    case Viewer = "viewer";
}
