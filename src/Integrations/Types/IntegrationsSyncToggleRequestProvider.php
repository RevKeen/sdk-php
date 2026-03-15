<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncToggleRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
