<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsRetryLogRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
