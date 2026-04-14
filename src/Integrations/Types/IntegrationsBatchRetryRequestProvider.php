<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsBatchRetryRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
