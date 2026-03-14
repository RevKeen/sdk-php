<?php

namespace RevKeen\Types;

enum WebhookEndpointStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
