<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsRetrieveResponseDataStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
