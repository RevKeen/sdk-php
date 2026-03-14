<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsDeactivateRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
