<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsGetProductMappingsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
