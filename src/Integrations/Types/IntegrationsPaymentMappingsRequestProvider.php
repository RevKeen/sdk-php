<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsPaymentMappingsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
