<?php

namespace RevKeen\Types;

enum AuthenticationErrorErrorCode: string
{
    case AuthenticationFailed = "authentication_failed";
    case InvalidApiKey = "invalid_api_key";
    case ExpiredApiKey = "expired_api_key";
}
