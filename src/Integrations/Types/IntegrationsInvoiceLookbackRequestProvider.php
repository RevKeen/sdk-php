<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsInvoiceLookbackRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
