<?php

namespace RevKeen\Comms\Types;

enum CommsMessagesSendRequestSource: string
{
    case Superinbox = "superinbox";
    case External = "external";
    case Api = "api";
    case Automation = "automation";
}
