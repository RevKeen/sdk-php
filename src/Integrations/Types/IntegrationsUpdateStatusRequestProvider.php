<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsUpdateStatusRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
