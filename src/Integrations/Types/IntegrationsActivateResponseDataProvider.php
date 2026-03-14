<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsActivateResponseDataProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
