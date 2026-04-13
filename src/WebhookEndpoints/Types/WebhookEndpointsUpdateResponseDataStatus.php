<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsUpdateResponseDataStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
