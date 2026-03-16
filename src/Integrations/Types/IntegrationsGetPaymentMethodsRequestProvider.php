<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetPaymentMethodsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
