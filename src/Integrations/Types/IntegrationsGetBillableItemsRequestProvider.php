<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetBillableItemsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
