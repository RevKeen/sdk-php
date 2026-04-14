<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsListResponseDataItemStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
