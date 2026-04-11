<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetUnmappedAttemptsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
