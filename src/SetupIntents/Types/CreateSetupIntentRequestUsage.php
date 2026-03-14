<?php

namespace RevKeen\SetupIntents\Types;

enum CreateSetupIntentRequestUsage: string
{
    case OnSession = "on_session";
    case OffSession = "off_session";
}
