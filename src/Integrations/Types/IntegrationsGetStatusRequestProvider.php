<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetStatusRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
