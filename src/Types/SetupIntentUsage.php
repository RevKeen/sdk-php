<?php

namespace RevKeen\Types;

enum SetupIntentUsage: string
{
    case OnSession = "on_session";
    case OffSession = "off_session";
}
