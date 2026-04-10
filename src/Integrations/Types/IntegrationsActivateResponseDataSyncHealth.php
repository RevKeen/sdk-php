<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsActivateResponseDataSyncHealth: string
{
    case Healthy = "healthy";
    case Degraded = "degraded";
    case Paused = "paused";
}
