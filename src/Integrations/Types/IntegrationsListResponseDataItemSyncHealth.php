<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsListResponseDataItemSyncHealth: string
{
    case Healthy = "healthy";
    case Degraded = "degraded";
    case Paused = "paused";
}
