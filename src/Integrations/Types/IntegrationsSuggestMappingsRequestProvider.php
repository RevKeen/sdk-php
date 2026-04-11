<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSuggestMappingsRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
