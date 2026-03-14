<?php

namespace RevKeen\Types;

enum WebhookEndpointListResponseDataItemStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
