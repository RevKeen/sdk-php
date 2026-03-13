<?php

namespace RevKeen\Types;

enum ForbiddenErrorErrorCode: string
{
    case InsufficientPermissions = "insufficient_permissions";
    case Forbidden = "forbidden";
}
