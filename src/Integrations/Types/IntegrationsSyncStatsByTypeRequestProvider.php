<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsSyncStatsByTypeRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
