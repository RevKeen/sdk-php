<?php

namespace RevKeen\Types;

enum WebhookEndpointUpdateResponseDataStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
