<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsActivateRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
