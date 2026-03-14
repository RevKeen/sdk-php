<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsPostPaymentMethodsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
