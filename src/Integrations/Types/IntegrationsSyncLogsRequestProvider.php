<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncLogsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
