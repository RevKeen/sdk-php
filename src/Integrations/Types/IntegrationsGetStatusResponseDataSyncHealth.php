<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetStatusResponseDataSyncHealth: string
{
    case Healthy = "healthy";
    case Degraded = "degraded";
    case Paused = "paused";
}
