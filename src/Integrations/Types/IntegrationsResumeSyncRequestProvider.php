<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsResumeSyncRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
