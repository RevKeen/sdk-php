<?php

namespace RevKeen\Integrations\Types;

enum IntegrationsAutoSendInvoicesRequestProvider: string
{
    case Practicehub = "practicehub";
    case Wodify = "wodify";
    case Terminal = "terminal";
}
