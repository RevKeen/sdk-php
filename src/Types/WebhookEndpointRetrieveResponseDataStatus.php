<?php

namespace RevKeen\Types;

enum WebhookEndpointRetrieveResponseDataStatus: string
{
    case Enabled = "enabled";
    case Disabled = "disabled";
}
