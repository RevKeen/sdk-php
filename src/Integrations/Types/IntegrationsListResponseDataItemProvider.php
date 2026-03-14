<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsListResponseDataItemProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
