<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncStatsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
