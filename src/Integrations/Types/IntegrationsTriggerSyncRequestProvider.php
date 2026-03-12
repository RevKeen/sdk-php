<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsTriggerSyncRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
}
