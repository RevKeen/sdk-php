<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

enum Environment: string
{
    case SANDBOX = 'https://staging-api.revkeen.com/v2';
    case PRODUCTION = 'https://api.revkeen.com/v2';
}
