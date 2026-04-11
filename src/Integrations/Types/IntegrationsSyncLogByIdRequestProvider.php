<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncLogByIdRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
