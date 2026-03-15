<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsUpdateStatusRequestStatus: string
{
    case Connected = "connected";
    case Error = "error";
    case Syncing = "syncing";
    case Idle = "idle";
}
