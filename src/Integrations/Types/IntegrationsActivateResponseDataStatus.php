<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsActivateResponseDataStatus: string
{
    case Connected = "connected";
    case Error = "error";
    case Syncing = "syncing";
    case Idle = "idle";
}
