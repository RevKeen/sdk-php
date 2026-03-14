<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsPutProductMappingsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
