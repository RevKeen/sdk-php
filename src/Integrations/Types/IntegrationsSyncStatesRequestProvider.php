<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncStatesRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
