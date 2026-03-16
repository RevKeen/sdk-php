<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncIntervalRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
