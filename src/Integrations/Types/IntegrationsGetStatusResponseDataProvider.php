<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetStatusResponseDataProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
