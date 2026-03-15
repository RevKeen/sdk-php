<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetStatusResponseDataStatus: string
{
    case Connected = "connected";
    case Error = "error";
    case Syncing = "syncing";
    case Idle = "idle";
}
