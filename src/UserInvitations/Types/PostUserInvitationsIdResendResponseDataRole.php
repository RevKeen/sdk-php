<?php

namespace RevKeen\UserInvitations\Types;

enum PostUserInvitationsIdResendResponseDataRole: string
{
    case Admin = "admin";
    case Member = "member";
    case Viewer = "viewer";
}
