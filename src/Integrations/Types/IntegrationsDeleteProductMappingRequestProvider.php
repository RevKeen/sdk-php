<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsDeleteProductMappingRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
