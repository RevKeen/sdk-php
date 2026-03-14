<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsListRequestStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
